<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentRegist extends Model
{
    protected $table = 'student_register';
    protected $fillable = array(
        'EntryStatus',
        'Created_by',
        'fname' ,
        'mname' ,
        'lname' ,
        'gender' ,
        'age',
        'dob',
        'birth_place' ,
        'cs' ,
        'religion',
        'Nationality',
        
    );
}
