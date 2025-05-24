<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lokacija;


class LokacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lokacija::create([
            'naziv' => 'Otkupna stanica Zlatar',
            'adresa' => 'Zlatar bb, Nova Varoš',
            'telefon' => '+381 64 123 4567',
            'radno_vreme' => '08:00 - 16:00',
            'lat' => 43.4065,
            'lng' => 19.8221,
        ]);
    
        Lokacija::create([
            'naziv' => 'Punkt Tara',
            'adresa' => 'Mitrovac, NP Tara',
            'telefon' => '+381 63 555 777',
            'radno_vreme' => '09:00 - 17:00',
            'lat' => 43.9383,
            'lng' => 19.5743,
        ]);
        Lokacija::create([
            'naziv' => 'Stanica Fruška Gora',
            'adresa' => 'Iriški venac bb, Fruška Gora',
            'telefon' => '+381 64 987 6543',
            'radno_vreme' => '07:00 - 15:00',
            'lat' => 45.1519,
            'lng' => 19.7969,
        ]);
    
        Lokacija::create([
            'naziv' => 'Otkup Valjevo',
            'adresa' => 'Industrijska zona, Valjevo',
            'telefon' => '+381 62 123 3210',
            'radno_vreme' => '08:00 - 14:00',
            'lat' => 44.2751,
            'lng' => 19.8982,
        ]);
    
        Lokacija::create([
            'naziv' => 'Punkt Kopaonik',
            'adresa' => 'Kopaonik bb, Brzeće',
            'telefon' => '+381 65 111 2222',
            'radno_vreme' => '09:00 - 17:00',
            'lat' => 43.2862,
            'lng' => 20.8222,
        ]);
    }
}
