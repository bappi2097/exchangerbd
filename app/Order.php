<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = [
        'send_wallet_name', 'wallet_account_id', 'send_amount', 'sending_contact', 'tnxid', 'receive_wallet_name', 'receiving_contact', 'receive_amount', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function walletAccount()
    {
        return $this->hasOne('App\WalletAccount', 'id', 'wallet_account_id');
    }
}
