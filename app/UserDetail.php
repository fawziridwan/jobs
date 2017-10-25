<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id','placeof_birth','gender','phone_number','file','status'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
 