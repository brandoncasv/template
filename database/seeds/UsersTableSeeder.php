<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'admin']);

        $user = config('auth.providers.users.model')::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => 'password',
            'status'   => 20,
        ]);

        $user->assignRole(['Super Admin', 'admin']);

    }
}
