<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

         // Voici la gate des administrateurs uniquement
         Gate::define("admin", function(User $user){
            return $user->hasRole("admin");
        });
        // Ici ne peut entrer que le(s) manager(s)
        Gate::define("manager", function(User $user){
            return $user->hasRole("manager");
        });
        Gate::define("employe", function(User $user){
            return $user->hasRole("employe");
        });
        
        // Cette gate va s'executer apres toutes les autres
        Gate::after(function(User $user){
            // Si le role est superadmin, true sera renvoyer
            return $user->hasRole("superadmin");
        });
    }
}
