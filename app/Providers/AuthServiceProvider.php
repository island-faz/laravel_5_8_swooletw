<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\AuthManager;
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

        //$this->terminateAuth(); 

        //
    }
    /**
    protected function terminateAuth() 
    { 
        $this->app->terminating( function() {
        // Rebind auth singleton
        $this->app->singleton('auth' , function( $app ) { $app['auth.loaded'] = true;
                return  new  AuthManager( $app ); 
            }); 
        }); 
    }
    **/
}
