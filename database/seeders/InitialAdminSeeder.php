<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialAdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sena.edu.co'],
            [
                'name' => 'Admin SENA',
                'role' => 'admin',
                'password' => Hash::make('Admin#2025'),
            ],
        );
    }
}
