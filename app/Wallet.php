<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'name', 'buy', 'sell', 'cost', 'reserve', 'wallet_img', 'is_bd', 'minimum', 'original_reserve', 'original_cost'
    ];
    public function walletAccounts()
    {
        return $this->hasMany('App\WalletAccount');
    }
}
