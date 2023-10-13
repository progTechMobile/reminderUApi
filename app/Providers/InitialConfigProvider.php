<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Support\ServiceProvider;

class InitialConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $roleAdmin = Role::where('name', 'admin')->where('status', 'perpetual')->first();
        if (empty($roleAdmin)) {
            $roleAdmin = new Role();
            $roleAdmin->name = 'admin';
            $roleAdmin->status = 'perpetual';
            $roleAdmin->save();
        }
    }
}
