<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatUser extends Pivot
{
    /** @use HasFactory<\Database\Factories\ChatUserFactory> */
    use HasFactory;

    protected $table = 'chat_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chat_id',
        'user_id',
        'is_admin',
        'active_since',
    ];

    public function clear()
    {
        $this->active_since = null;
        $this->update();
    }
}
