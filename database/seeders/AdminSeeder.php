<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                'firstName' => 'Dima',
                'lastName' => 'Antoniv',
                'email' => 'dimaAnt@gmail.com',
                'password' => Hash::make(1234),
                'phone_number' => '0123456789',
                'role' => 'admin'
            ]
        );

        User::create([
                'firstName' => 'Vasya',
                'lastName' => 'Petriv',
                'email' => 'vasya@gmail.com',
                'password' => Hash::make(5678),
                'phone_number' => '0987654321',
                'role' => 'admin'
            ]
        );
    }
}
