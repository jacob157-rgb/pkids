<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Master Admin',
            'qrid' => 'admin123',
            'password' => Hash::make('1234'), // Replace with a secure password
            'role' => 'admin',
        ]);

        // Operator User
        User::create([
            'name' => 'Kaka PKIDS',
            'qrid' => 'kaka123',
            'password' => Hash::make('1234'), // Replace with a secure password
            'role' => 'operator',
        ]);

        // Bazaar User
        User::create([
            'name' => 'Seller Bazaar',
            'qrid' => 'seller123',
            'password' => Hash::make('1234'), // Replace with a secure password
            'role' => 'bazaar',
        ]);

    }
}
