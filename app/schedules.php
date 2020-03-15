<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedules extends Model
{
    //
    public function userSchedule()
    {
        return $this->belongsTo('App\User');
    }
}
