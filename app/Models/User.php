<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst(strtolower(trim($value)))
        );
    }

    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst(strtolower(trim($value)))
        );
    }

    public function name(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function role(): string
    {
        $words = explode('_', $this->role);
        $words = array_map(fn ($value) => ucfirst(strtolower($value)), $words);

        return implode(' ', $words);
    }

    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar && Str::startsWith($this->avatar, ['http://', 'https://'])) {
            return $this->avatar;
        }

        return $this->avatar
            ? Storage::url($this->avatar)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name()) . '&background=random';
    }

    public function scopeWithFullName(Builder $query): void
    {
        $query->selectRaw("*, CONCAT(first_name, ' ', last_name) AS name");
    }

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class)
            ->using(ChatUser::class)
            ->withPivot('role', 'active_since')
            ->withTimestamps();
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function messageStatus(): BelongsToMany
    {
        return $this->belongsToMany(Message::class)
            ->withPivot('sent_at', 'delivered_at', 'read_at', 'deleted_at')
            ->withTimestamps();
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class)->latestOfMany(['created_at', 'id']);
    }

    public function activeChats(): BelongsToMany
    {
        return $this->chats()
            ->whereNotNull('chat_user.active_since')
            ->where('chat_user.active_since', '<', now())
            ->orderByDesc(
                DB::raw('
                    COALESCE(
                        (SELECT created_at FROM messages
                         WHERE messages.chat_id = chats.id
                         ORDER BY created_at DESC, id DESC LIMIT 1),
                        chats.created_at
                    )
                ')
            );
    }
}
