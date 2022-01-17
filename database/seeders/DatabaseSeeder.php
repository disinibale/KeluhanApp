<?php

namespace Database\Seeders;

use App\Models\Complaints;
use Illuminate\Database\Seeder;

use App\Models\Customers;
use App\Models\Technicians;
use App\Models\User;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        
        User::factory(5)->create()->each(function ($user) {
            Customers::factory()->count(1)->for($user)->create();
            Complaints::factory()->count(1)->for($user)->create();
            $user->assignRole('user');
        });
        Technicians::factory(10)->create();
        
    }
}
