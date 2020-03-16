<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    //
    protected $table = 'user_rights';
    
    public function User(){
        return $this->belongsTo('App\User','user_level');
    }
}
