<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'full_name' => 'Vincensius Damar A',
            'username' => 'vito',
            'email' => 'adyatmav@gmail.com',
            'phone_number' => '1234567890',
            'address' => 'Indonesia',
            'password' => Hash::make('123'),
        ]);

        
        // Assign role ke pengguna
        $user->assignRole('user');
    }
}
