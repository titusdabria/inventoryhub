<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(){
//Remove duplicates
        User::where('email', 'admin@inventoryhub.test')->delete();
        User::where('email', 'staff@inventoryhub.test')->delete();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@inventoryhub.test',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Staff User',
            'email' => 'staff@inventoryhub.test',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
        ]);
    }
}