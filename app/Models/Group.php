<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'chat_id',
    ];
    protected $appends = ['avatar_url'];

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    public function getAvatarUrlAttribute(): string
    {
        return $this->avatar ? Storage::url($this->avatar)
            : 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=random';
    }
}
