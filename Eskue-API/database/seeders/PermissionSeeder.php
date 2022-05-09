<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = [
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'comment-list', 'comment-create', 'comment-edit', 'comment-delete',
            'like-list', 'like-create', 'like-edit', 'like-delete',
            'message-list', 'message-create', 'message-edit', 'message-delete',
            'post-list', 'post-create', 'post-edit', 'post-delete',
            'serviceType-list', 'serviceType-create', 'serviceType-edit', 'serviceType-delete',
            'service-list', 'service-create', 'service-edit', 'service-delete',
            'user-list', 'user-create', 'user-edit', 'user-delete',
         ];

        foreach ($permissions as $permission)
        { Permission::create(['name' => $permission]); }
    }
}
