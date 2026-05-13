<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        /**
         * Gate: الوصول للوحة التحكم
         */
        Gate::define('access-dashboard', function (User $user) {
            return $user->isAdmin() || $user->isEditor();
        });

        /**
         * Gate: إدارة المستخدمين (admin فقط)
         */
        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin();
        });
    }
}
