<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'superadmin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Hashing the password
            ]
        ];
        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']], 
                $userData
            );
        }
    }
}
