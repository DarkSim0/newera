<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        //admin
        $gate->define('isAdmin',function($user){
            return $user->user_type == '1';
        });

        //student
        $gate->define('isStudent',function($user){
            return $user->user_type == '2';
        });
        
        //staff
        $gate->define('isStaff',function($user){
            return $user->user_type == '3';
        });
    }
}
