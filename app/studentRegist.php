<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentRegist extends Model
{
    protected $table = 'student_register';
    protected $primaryKey = 'Created_by';
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
        'contactnum',
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
        'firstChoice',
        'secondChoice'
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
