<?php

namespace Database\Seeders;

use App\Models\AdministrativeZone;
use App\Models\Branch;
use App\Models\Service;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $zone = AdministrativeZone::query()->pluck('Id');
        $tenas = User::query()->create([
            'id' => Uuid::uuid4(),
            'f_name' => 'tenas',
            'l_name' => 'steve',
            'email' => 'tenas@gmail.com',
            'password' => Hash::make('password'),
            'tel' => '653051037',
            'zone_id' => $zone[0],
        ]);
        $tenas->assignRole('Admin');

        $users = User::all();
        foreach ($users as $user){
            $service = Service::query()->pluck('Id')->random(1);
            $user->attach($service);
            $role = Role::query()->pluck('name')->random(1);
            $user->assignRole($role);
        }

    }
}
