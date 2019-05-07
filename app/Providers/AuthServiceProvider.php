<?php

namespace App\Providers;

use App\Role;
use App\User;
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

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Disciplines
        Gate::define('discipline_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('discipline_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('discipline_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('discipline_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('discipline_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Questions
        Gate::define('question_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('question_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('question_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('question_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('question_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tests
        Gate::define('test_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('test_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('test_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('test_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('test_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Categories
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1, 2, 3]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1, 3]);
        });

    }
}
