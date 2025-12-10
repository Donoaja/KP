<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Creates an admin user only if one with this email doesn't exist.
        User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Administrator',
            // Default password is `password` (bcrypt). Change after first login.
            'password' => bcrypt('password'),
        ]);
    }
}
