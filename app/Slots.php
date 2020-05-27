<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slots extends Model
{
    protected $table = 'slots';
    protected $fillable = ['slots','reserve','student_sched'];
}
