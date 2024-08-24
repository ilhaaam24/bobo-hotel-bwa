<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        $permission = [
            'manage countries',
            'manage cities',
            'manage hotels',            
            'manage hotel bookings',
            'checkout hotels',
            'view hotel bookings',
        ];

        foreach($permission as $perm){
           Permission::firstOrCreate([
            'name' => $perm
           ]);
        }

        $customerRole = Role::firstOrCreate([
            'name' => 'customer'
        ]);

        $customerPermissions = [
            'view hotel bookings',
            'checkout hotels'
        ];
        $customerRole->syncPermissions($customerPermissions);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Super_Admin',
            'email' => 'super@admin.com',
            'avatar' => 'image/dummyavatar.png',
            'password' => bcrypt('admin123'),
        ]);
        $user->assignRole($superAdminRole);
    }
}
