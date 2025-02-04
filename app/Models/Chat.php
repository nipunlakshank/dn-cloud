<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
        'name',
        'avatar',
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

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(ChatUser::class)
            ->withPivot('is_admin', 'active_since')
            ->withTimestamps();
    }

    public function otherUsers(User $user)
    {
        return $this->users()->where('user_id', '!=', $user->id);
    }

    public function activeUsers()
    {
        return $this->users()->whereNotNull('chat_user.active_since');
    }
}
