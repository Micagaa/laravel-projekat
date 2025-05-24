<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['naziv' => 'user', 'opis' => 'Običan korisnik'],
            ['naziv' => 'editor', 'opis' => 'Urednik sadržaja'],
            ['naziv' => 'admin', 'opis' => 'Administrator'],
        ]);
    }
}
