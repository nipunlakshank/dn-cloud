<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletOperation extends Model
{
    protected $fillable = [
        'wallet_id',
        'user_id',
        'action',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
