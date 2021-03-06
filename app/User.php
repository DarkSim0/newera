<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function register(){
        return $this->hasOne(studentRegist::class,'Created_by');
    }

    public function sched(){
        return $this->hasOne(schedules::class,'id');
    }

    public function level(){
        return $this->belongsTo('App\UserLevel','user_level'); // select * from user_rights where id = 1
    }
    public function upfiles(){
        return $this->hasOne(Uploads::class,'Created_by');
    }
}
