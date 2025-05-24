<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plod;

class PlodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plod::create([
            'naziv' => 'Borovnica',
            'opis' => 'Sveže domaće borovnice iz planinskih predela.',
            'cena_po_kg' => 1200,
            'slika' => 'borovnica.jpg',
            'vrsta' => 'Bobičasto voće',
            'istaknuto' => true,
        ]);

        Plod::create([
            'naziv' => 'Malina',
            'opis' => 'Prvoklasne maline pogodne za preradu i zamrzavanje.',
            'cena_po_kg' => 1000,
            'slika' => 'malina.jpg',
            'vrsta' => 'Bobičasto voće',
            'istaknuto' => true,
        ]);

        Plod::create([
            'naziv' => 'Kupina',
            'opis' => 'Slatke i sočne kupine iz netaknute prirode.',
            'cena_po_kg' => 900,
            'slika' => 'kupina.jpg',
            'vrsta' => 'Bobičasto voće',
            'istaknuto' => false,
        ]);

        Plod::create([
            'naziv' => 'Vrganj',
            'opis' => 'Visokokvalitetne gljive vrganja, sveže ubrano.',
            'cena_po_kg' => 2500,
            'slika' => 'vrganj.jpg',
            'vrsta' => 'Gljive',
            'istaknuto' => true,
        ]);

        Plod::create([
            'naziv' => 'Lisičarka',
            'opis' => 'Poznata gljiva narandžaste boje, odličnog ukusa.',
            'cena_po_kg' => 2200,
            'slika' => 'lisicarka.jpg',
            'vrsta' => 'Gljive',
            'istaknuto' => false,
        ]);
    }
}
