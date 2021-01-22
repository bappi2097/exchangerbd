<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = "password_resets";
    protected $primaryKey = 'email';
    const UPDATED_AT = null;
    protected $fillable = [
        'email', 'token', 'created_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'email', 'email');
    }
}
