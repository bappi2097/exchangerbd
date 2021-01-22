<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletAccount extends Model
{
    protected $fillable = [
        'wallet_id', 'contact', 'status',
    ];
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
    public function order()
    {
        return $this->belongsTo('App\Order', 'wallet_account_id', 'id');
    }
}
