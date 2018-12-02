<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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

        Gate::define('isWard',function ($user){
            return $user->type === 'ward';
        });
        Gate::define('isEmployee',function ($user){
            return $user->type === 'employee';
        });

        Gate::define('isResidence',function ($user){
            return $user->type === 'residence';
        });
    }
}
