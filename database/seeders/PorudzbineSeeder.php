<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Porudzbina;
use App\Models\User;
use App\Models\Plod;

class PorudzbineSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::whereHas('role', function ($q) {
            $q->where('name', 'user');
        })->get();

        $plodovi = Plod::all();

        foreach ($users as $user) {
            foreach ($plodovi->random(min(2, $plodovi->count())) as $plod) {
                Porudzbina::create([
                    'user_id' => $user->id,
                    'plod_id' => $plod->id,
                    'kolicina' => rand(1, 5),
                    'kontakt' => 'user'.$user->id.'@primer.com'
                ]);
            }
        }
    }
}
