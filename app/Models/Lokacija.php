<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Lokacija extends Model
{
    protected $fillable = ['naziv', 'adresa', 'telefon', 'radno_vreme', 'lat', 'lng'];
}
