<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
          'create products',
          'view products',
          'update products',
          'delete products'  ,

            'create categories',
            'view categories',
            'update categories',
            'delete categories',
        ];
        foreach ($permissions as $permission)
        {
            Permission::query()->firstOrCreate([
                'name' => $permission,
                'guard_name' => 'admin'
            ]);
        }

        $superAdmin = Role::query()->firstOrCreate([
            'name' => 'super admin',
            'guard_name' => 'admin'
        ]);
        $superAdmin->givePermissionTo(Permission::all());

        $productAdmin = Role::query()->firstOrCreate([
            'name' => 'product admin',
            'guard_name' => 'admin'
        ]);
        $productAdmin->givePermissionTo([
           'create products', 'view products', 'update products', 'delete products',
        ]);

        $categoryAdmin = Role::query()->firstOrCreate([
            'name' => 'category admin',
            'guard_name' => 'admin'
        ]);
        $categoryAdmin->givePermissionTo([
            'create categories', 'view categories', 'update categories', 'delete categories',
        ]);


        $superAdminUser = Admin::query()->firstOrCreate([
            'email' => 'superAdminUser@gmail.com'
        ],[
           'name' => 'superAdmin',
            'password' => bcrypt('password'),
            'mobile' => '09953316528'
        ]);
        $superAdminUser->assignRole('super admin');

        $productAdminUser = Admin::query()->firstOrCreate([
            'email' => 'productAdmin@gmail.com'
        ],[
            'name' => 'productAdmin',
            'password' => bcrypt('password'),
            'mobile' => '09923315528'
        ]);
        $productAdminUser->assignRole('product admin');

        $categoryAdminUser = Admin::query()->firstOrCreate([
            'email' => 'categoryAdmin@gmail.com'
        ],[
            'name' => 'categoryAdmin',
            'password' => bcrypt('password'),
            'mobile' => '09925316528'
        ]);
        $categoryAdminUser->assignRole('category admin');
    }
}
