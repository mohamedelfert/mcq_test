<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'       => 'Mohamed Ibrahiem',
            'email'      => 'mohamed@yahoo.com',
            'password'   => bcrypt('123456'),
            'phone'      => '01153225410',
            'role_name'  => 'admin',
            'status'     => 'active',
        ]);

        $role = Role::create(['name' => 'superAdmin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
