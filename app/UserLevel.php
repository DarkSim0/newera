<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    //
    protected $table = 'user_rights';
    
    public function accessLevel(){
        return $this->hasMany('App\User','user_level'); //select * from users where user_level
    }
    
}
