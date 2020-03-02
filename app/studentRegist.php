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
        'streetadd',
        'townprovince',
        'emailbasic',
        'landlinenum',
        'fatherfname',
        'fatherlname',
        'fathermname',
        'fathernationality',
        'fatheroccupation',
        'motherfname',
        'motherlname',
        'mothermname',
        'mothernationality',
        'motheroccupation',
        'contactper',
        'guardiancon',
        'elementary',
        'elemattend',
        'elemgrad',
        'highschool',
        'highattend',
        'highgrad',
        'senior',
        'seniorattend',
        'seniorgrad',
        'college',
        'collegeattend',
        'collegegrad',
        'vocational',
        'vocattend',
        'vocgrad',
    );
}
