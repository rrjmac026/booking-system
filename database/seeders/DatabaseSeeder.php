<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => env('LANDLORD_USER_NAME'),
            'email' => env('LANDLORD_USER_EMAIL'),
            'role' => env('LANDLORD_USER_ROLE'),
            'password' => bcrypt(env('LANDLORD_USER_PASSWORD')),
        ]);
    }
}
