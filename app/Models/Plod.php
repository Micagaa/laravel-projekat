<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plod extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv', 'opis', 'cena_po_kg', 'slika', 'vrsta', 'istaknuto'
    ];
}
