<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Message;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            AdministrativeZoneSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
        ServiceType::factory(5)->create();
        Service::factory(10)->create();
        User::factory(50)->create();
        Post::factory(100)->create();
        Comment::factory(500)->create();
        Like::factory(100)->create();
        Message::factory(1000)->create();
        $this->call(UserSeeder::class);
    }
}
