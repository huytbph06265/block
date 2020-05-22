<?php

namespace App\Providers;

use App\Policies\CatePolicy;
use App\Policies\PostPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
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

        Gate::resource('post',PostPolicy::class);
        Gate::resource('cate',CatePolicy::class);
        Gate::resource('role',RolePolicy::class);
        Gate::resource('user',UserPolicy::class);

//        Gate::define('post.view', function ($user){
//            dd($user->hasPermission());
//            return $user->hasPermission();
//        });
        //
    }
}
