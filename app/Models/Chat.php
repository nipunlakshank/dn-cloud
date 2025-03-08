<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'is_group',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class)->with('user');
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class)->orderByDesc('created_at')->orderByDesc('id');
    }

    public function group(): HasOne
    {
        return $this->hasOne(Group::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(ChatUser::class)
            ->withPivot('role', 'active_since')
            ->withTimestamps();
    }

    public function otherUsers(int $currentUserId): BelongsToMany
    {
        return $this->users()->where('user_id', '!=', $currentUserId);
    }

    public function activeUsers(): BelongsToMany
    {
        return $this->users()->whereNotNull('chat_user.active_since');
    }

    public function clear(): void
    {
        $this->users()->updateExistingPivot(Auth::id(), [
            'active_since' => now(),
        ]);
    }
}
