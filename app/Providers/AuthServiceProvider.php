<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $policies = [
        User::class => UserPolicy::class,
        Product::class => ProductPolicy::class,
    ];

    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('addUser', function (User $user) {
            return $user->hasRole('admin');
        });
        Gate::define('deleteUser', function (User $user) {
            return $user->hasRole('admin') && $user->can('delete user');
        }
        );
        Gate::define('deleteProduct', function (User $user) {
            return $user->hasRole('admin') && $user->can('delete product');
        }
        );
    }
}
