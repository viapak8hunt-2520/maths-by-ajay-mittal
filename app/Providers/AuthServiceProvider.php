<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('access-admin', fn (User $user) => $user->isAdminUser());

        Gate::define('manage-content', fn (User $user) => $user->is_active && in_array($user->role, [
            UserRole::SuperAdmin,
            UserRole::ContentManager,
        ], true));

        Gate::define('manage-enquiries', fn (User $user) => $user->isAdminUser());

        Gate::define('manage-users', fn (User $user) => $user->is_active && $user->role === UserRole::SuperAdmin);
    }
}
