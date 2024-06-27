<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Info;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '12345'
        ]);

        Employer::factory()->create([
            'user_id' => '1',
            'name_emp' => 'Google',
        ]);

        $this->call(InfoSeeder::class);
    }
}
