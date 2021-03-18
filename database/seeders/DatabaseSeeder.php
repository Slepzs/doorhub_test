<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creating default roles
        $adminRole = Role::factory()->create([
            'role' => 'Admin'
        ]);
        $clientRole = Role::factory()->create([
            'role' => 'Client'
        ]);

        // Admin user
       $admin = User::factory()->create([
           'username' => 'doorhub',
           'email' => 'doorhub@io.com',
       ]);

        // all passwords are password
        $MrClient1 = User::factory()->create([
            'username' => 'Clint1',
            'email' => 'MrClinet@gmail.com'
        ]);

        $MrClient2 = User::factory()->create([
            'username' => 'Clint2',
            'email' => 'MrClinet2@gmail.com'
        ]);

        Company::factory()->create([
            'companyName' => 'company1'
        ]);

        Company::factory()->create([
            'companyName' => 'company2'
        ]);

        UserRole::factory()->create([
            'user_id' => $admin->id,
            'role_id' => $adminRole->id
        ]);

        UserRole::factory()->create([
            'user_id' => $MrClient1->id,
            'role_id' => $clientRole->id
        ]);

        UserRole::factory()->create([
            'user_id' => $MrClient2->id,
            'role_id' => $clientRole->id
        ]);










        //


    }
}
