<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'       => 'test user',
            'email'      => 'test@yahoo.com',
            'password'   => bcrypt('123456789'),
            'phone'      => '01011230154',
            'role_name'  => 'user',
            'status'     => 'active',
        ]);

        $role = Role::create(['name' => 'user']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
