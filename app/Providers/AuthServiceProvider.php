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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('if_admin', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('if_moderator', function($user){
            return $user->hasRole('moderator');
        });

        Gate::before(function ($user, $ability){
            if($user->hasRole('admin')){
                return true;
            }
        });
    }
}
