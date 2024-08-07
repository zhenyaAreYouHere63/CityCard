<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
                'firstName' => 'Vlad',
                'lastName' => 'Vlad',
                'email' => 'Vladislav@gmail.com',
                'password' => Hash::make(1234),
            ]
        );

        Admin::create([
                'firstName' => 'Alina',
                'lastName' => 'Alina',
                'email' => 'Alina@gmail.com',
                'password' => Hash::make(5678),
            ]
        );
    }
}
