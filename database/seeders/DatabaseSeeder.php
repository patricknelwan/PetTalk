<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Andika',
                'email' => 'andika@admin.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'admin',
            ],
            [
                'name' => 'Kenny',
                'email' => 'kenny@admin.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'admin',
            ],
            [
                'name' => 'Patrick',
                'email' => 'patrick@admin.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'admin',
            ],
            [
                'name' => 'Owen',
                'email' => 'owen@admin.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'admin',
            ],
            [
                'name' => 'Christopher',
                'email' => 'chris@admin.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'admin',
            ],
            [
                'name' => 'dosen1',
                'email' => 'dosen@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'customer',
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '0212345678',
                'address' => 'binus kemanggisan',
                'role' => 'customer',
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
