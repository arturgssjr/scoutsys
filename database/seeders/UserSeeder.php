<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'User Test',
            'email' => 'user@test.com',
            'document' => '87027475707',
            'date_of_birth' => '2000-01-01',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
        ]);

        User::factory(9)->create();
    }
}
