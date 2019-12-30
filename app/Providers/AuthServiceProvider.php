<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAllowed', function($user,$allowed){
            $allowed = explode(':',$allowed);
            $roles = $user->role->pluck('name')->toArray();
            return array_intersect($allowed, $roles);
        });
        Gate::define('isAllowPosts','App\Gates\PostGate@allowed');
        Gate::define('isPosts-Edit','App\Gates\PostGate@allowedPostEdit');


        // Gate::define('isAdmin_all', function($user){
        //     $roles = $user->role->pluck('name')->toArray();
        //     return in_array('Admin',$roles);
        // });
        // Gate::define('isVendor', function($user){
        //     $roles = $user->role->pluck('name')->toArray();
        //     if(in_array('Vendor',$roles)){
        //         return true;
        //     }
        // });
    }
}
