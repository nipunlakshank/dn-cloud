<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'is_active',
        'avatar',
        'active_since',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'timestamp',
            'password' => 'hashed',
        ];
    }

    public function name(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeWithFullName(Builder $query): void
    {
        $query->selectRaw("*, CONCAT(first_name, ' ', last_name) AS name");
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class)
            ->using(ChatUser::class)
            ->withPivot('role', 'active_since')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function messageStatus()
    {
        return $this->belongsToMany(Message::class)
            ->withPivot('sent_at', 'delivered_at', 'read_at', 'deleted_at')
            ->withTimestamps();
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany(['created_at', 'id']);
    }

    public function activeChats()
    {
        return $this->chats()
            ->whereNotNull('chat_user.active_since') // Only active chats
            ->orderByDesc(
                Message::select('created_at')
                    ->whereColumn('chat_id', 'chats.id')
                    ->orderByDesc('created_at')
                    ->orderByDesc('id')
                    ->limit(1)
            );
    }
}
