<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedules extends Model
{
    //
    protected $table = 'schedules';

    protected $fillable = array(
        'Created_by',
        'student_sched',
        'title',
        'student_schedEnd',
        'status',
    );

    public function userSchedule()
    {
        return $this->belongsTo('App\User');
    }

    public function studentSchedule(){
        return $this->belongsTo(studentRegist::class,'Created_by');
    }
}
