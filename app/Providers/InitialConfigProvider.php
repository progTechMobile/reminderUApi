<?php

namespace App\Providers;

use App\Enums\UserType;
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
            $roleAdmin = Role::firstOrNew(['name' => UserType::Admin, 'status' => 'perpetual']);
            
            if (!$roleAdmin->exists) {
                $roleAdmin->save();
            }

            //crear usuario con variables del .env
            $user = User::firstOrNew(['email' => env('ADMIN_EMAIL')]);

            if (!$user->exists) {
                $user->name = env('ADMIN_NAME');
                $user->last_name = env('ADMIN_LAST_NAME');
                $user->email = env('ADMIN_EMAIL');
                $user->password = bcrypt(env('ADMIN_PASSWORD'));
                $user->role_id = $roleAdmin->id;
                $user->save();
            }

            $roleStudent = Role::firstOrNew(['name' => UserType::Student, 'status' => 'active']);

            if (!$roleStudent->exists) {
                $roleStudent->save();
            }
        } catch (Exception $e) {
            echo ($e);
            Log::error($e->getMessage());
        }
    }
}