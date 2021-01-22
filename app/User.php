<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'username', 'phone', 'address', 'is_active', 'active_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function feedback()
    {
        return $this->hasOne('App\feedback', 'user_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function passwordReset()
    {
        return $this->hasOne('App\PasswordReset', 'email', 'email');
    }
}
