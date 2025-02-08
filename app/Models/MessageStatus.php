<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageInformation extends Model
{
    protected $fillable = [
        'user_id',
        'message_id',
        'status',
        'is_deleted',
    ];
}
