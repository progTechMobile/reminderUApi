<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\ServiceProvider;
use Log;

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
        try {
            $roleAdmin = Role::where('name', 'admin')->where('status', 'perpetual')->first();
            if (empty($roleAdmin)) {
                $roleAdmin = new Role();
                $roleAdmin->name = 'admin';
                $roleAdmin->status = 'perpetual';
                $roleAdmin->save();
            }

            //crear usuario con variables del .env
            $user = User::where('email', env('ADMIN_EMAIL'))->first();
            if (empty($user)) {
                $user = new User();
                $user->name = env('ADMIN_NAME');
                $user->last_name = env('ADMIN_LAST_NAME');
                $user->email = env('ADMIN_EMAIL');
                $user->password = bcrypt(env('ADMIN_PASSWORD'));
                $user->role_id = $roleAdmin->id;
                $user->save();
            }

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}