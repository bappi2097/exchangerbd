<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = [
        'rating', 'comment', 'index', 'status'
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
