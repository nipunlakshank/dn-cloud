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

    public function replies()
    {
        return $this->hasMany(Message::class, 'replied_to');
    }

    public function info()
    {
        return $this->belongsToMany(User::class)
            ->using(MessageInformation::class)
            ->withPivot('status', 'is_deleted')
            ->withTimestamps();
    }

    public function repliedTo()
    {
        return $this->belongsTo(Message::class, 'replied_to');
    }

    public function deleteForMe()
    {
        $this->info()->where('user_id', Auth::id())->update(['is_deleted' => true]);
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
        $this->info()->update(['is_deleted' => true]);
    }
}
