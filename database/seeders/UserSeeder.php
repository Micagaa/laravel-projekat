<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
    
        User::create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
    
        User::create([
            'name' => 'Korisnik',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
    }
}
