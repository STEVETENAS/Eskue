<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Admin']);
        $role1 = Role::create(['name' => 'Company']);
        $role2 = Role::create(['name' => 'Person']);

        $role->givePermissionTo(Permission::query()->pluck('id', 'id'));
        $role1->givePermissionTo(Permission::query()->pluck('id', 'id')->only([4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,24,25,26,28,29]));
        $role2->givePermissionTo(Permission::query()->pluck('id', 'id')->only([4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,24,28,29]));
    }
}
