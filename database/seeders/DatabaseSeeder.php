<?php

namespace Database\Seeders;

use App\Models\Company;
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

        Company::factory()->create([
            'name_com' => 'Google',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'company_id' => '1',
            'admin' => true,
            'email' => 'test@example.com',
            'password' => '12345'
        ]);

        $this->call(InfoSeeder::class);
    }
}
