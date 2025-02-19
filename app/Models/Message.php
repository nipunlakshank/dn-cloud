<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chat_id',
        'user_id',
        'text',
        'is_reply',
        'is_deleted',
    ];

    private int $deleteBeforeSeconds = 60 * 5;

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(MessageAttachment::class);
    }

    public function receivers()
    {
        return $this->chat->users()->where('user_id', '!=', Auth::id());
    }

    public function replies()
    {
        return $this->hasMany(Message::class, 'replied_to');
    }

    public function status()
    {
        return $this->belongsToMany(User::class, 'message_status')
            ->withPivot('sent_at', 'delivered_at', 'read_at', 'deleted_at')
            ->withTimestamps();
    }

    public function repliedTo()
    {
        return $this->belongsTo(Message::class, 'replied_to');
    }

    public function deleteForMe()
    {
        $this->info()->where('user_id', Auth::id())->update(['deleted_at' => now()]);
    }

    public function canDeleteForAll(): bool
    {
        return Auth::user()->id === $this->user_id
            && $this->created_at->diffInSeconds() < $this->deleteBeforeSeconds;
    }

    public function deleteForAll()
    {
        if (!$this->canDeleteForAll()) {
            return;
        }
        $this->update(['is_deleted' => true]);
    }
}
