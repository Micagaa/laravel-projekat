<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Porudzbina extends Model
{
    protected $table = 'porudzbine';

    protected $fillable = [
        'user_id', 'plod_id', 'kolicina', 'kontakt'
    ];

    public function plod()
    {
        return $this->belongsTo(Plod::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
