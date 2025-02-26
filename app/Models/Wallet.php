<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'name',
        'group_id',
        'is_active',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function operations()
    {
        return $this->hasMany(WalletOperation::class);
    }

    public function users()
    {
        return $this->group->chat->users();
    }
}
