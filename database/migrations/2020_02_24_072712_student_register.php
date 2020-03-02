<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_register', function (Blueprint $table) 
        {
            $table->increments('enrollID');
            $table->integer('Created_by');
            $table->string('EntryStatus');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('gender');
            $table->integer('age');
            $table->string('dob');
            $table->string('birth_place');
            $table->string('cs');
            $table->string('religion');
            $table->string('Nationality');
            $table->string('streetadd');
            $table->string('townprovince');
            $table->string('emailbasic');
            $table->string('landlinenum')->nullable();
            $table->string('fatherfname')->nullable();
            $table->string('fatherlname')->nullable();
            $table->string('fathermname')->nullable();
            $table->string('fathernationality')->nullable();
            $table->string('fatheroccupation')->nullable();
            $table->string('motherfname')->nullable();
            $table->string('motherlname')->nullable();
            $table->string('mothermname')->nullable();
            $table->string('mothernationality')->nullable();
            $table->string('motheroccupation')->nullable();
            $table->string('contactper');
            $table->string('guardiancon');
            $table->string('elementary')->nullable();
            $table->string('elemattend')->nullable();
            $table->string('elemgrad')->nullable();
            $table->string('highschool')->nullable();
            $table->string('highattend')->nullable();
            $table->string('highgrad')->nullable();
            $table->string('senior')->nullable();
            $table->string('seniorattend')->nullable();
            $table->string('seniorgrad')->nullable();
            $table->string('college')->nullable();
            $table->string('collegeattend')->nullable();
            $table->string('collegegrad')->nullable();
            $table->string('vocational')->nullable();
            $table->string('vocattend')->nullable();
            $table->string('vocgrad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_register');
    }
}
