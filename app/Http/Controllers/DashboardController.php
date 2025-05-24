<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Plod;
use App\Models\Lokacija;
use App\Models\Porudzbina;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Admin prikaz
        if ($user->role && $user->role->name === 'admin') {
            $users = User::with('role')->get();

            // Dodaj podatke za chart - broj porudžbina po mesecima
            $chartData = Porudzbina::select(
                DB::raw('MONTH(created_at) as mesec'),
                DB::raw('COUNT(*) as broj')
            )
            ->groupBy('mesec')
            ->orderBy('mesec')
            ->get();

            return view('dashboard', compact('users', 'chartData'));
        }

        // Editor prikaz
        if ($user->role && $user->role->name === 'editor') {
            $plodovi = Plod::all();
            $lokacije = Lokacija::all();
            return view('dashboard', compact('plodovi', 'lokacije'));
        }

        // User prikaz
        if ($user->role && $user->role->name === 'user') {
            $porudzbine = Porudzbina::with('plod')
                ->where('user_id', $user->id)
                ->get();

            return view('dashboard', compact('porudzbine'));
        }

        return view('dashboard');
    }
}
