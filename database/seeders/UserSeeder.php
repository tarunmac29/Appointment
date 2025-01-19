<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Doctor John',
            'email' => 'doctorjohn@example.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);

        User::create([
            'name' => 'Patient Jane',
            'email' => 'patientjane@example.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);
    }
}
