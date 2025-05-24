<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plod;

class HomeController extends Controller
{
    public function index()
    {
        $plodovi = Plod::where('istaknuto', true)->take(4)->get();
        return view('home', compact('plodovi'));
    }
}
