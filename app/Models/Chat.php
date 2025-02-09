<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_group'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class)->with('user');
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->orderByDesc('created_at')->orderByDesc('id');
    }

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(ChatUser::class)
            ->withPivot('role', 'active_since')
            ->withTimestamps();
    }

    public function otherUsers(int $userId = null)
    {
        return $this->users()->where('user_id', '!=', $userId ?? Auth::id());
    }

    public function activeUsers()
    {
        return $this->users()->whereNotNull('chat_user.active_since');
    }
}
