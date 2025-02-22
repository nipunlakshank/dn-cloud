<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /** @use Spatie Package */
    use HasRoles;

    use Notifiable;

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
        'is_active',
        'avatar',
        'active_since',
    ];

    protected $appends = ['avatar_url'];

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

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && Str::startsWith($this->avatar, ['http://', 'https://'])) {
            return $this->avatar;
        }

        return $this->avatar
            ? url("storage/{$this->avatar}")
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name()) . '&background=random';
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
            ->whereNotNull('chat_user.active_since')
            ->where('chat_user.active_since', '<', now())
            ->orderByDesc(
                Message::select('created_at')
                    ->whereColumn('chat_id', 'chats.id')
                    ->orderByDesc('created_at')
                    ->orderByDesc('id')
                    ->limit(1)
            );
    }
}
