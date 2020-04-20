<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    //
    protected $table = 'uploads';
    protected $fillable = ['Created_by','file'];
    public function usersUploads()
    {
        return $this->belongsTo(User::class);
    }

    public function studentUploads()
    {
        return $this->hasOne(studentRegist::class,'Created_by');
    }
}
