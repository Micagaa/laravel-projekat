<?php

namespace App\Http\Controllers;

use App\Models\Lokacija;
use Illuminate\Http\Request;

class LokacijaController extends Controller
{
    public function indexPublic()
    {
        $lokacije = Lokacija::all();
        return view('lokacije', ['lokacije' => $lokacije]);
    }

         public function create()
    {
        return view('lokacijee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'radno_vreme' => 'required'
        ]);

        Lokacija::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Lokacija uspešno dodata.');
    }

    public function edit(Lokacija $lokacija)
    {
        return view('lokacijee.edit', compact('lokacija'));
    }

    public function update(Request $request, Lokacija $lokacija)
    {
        $request->validate([
            'naziv' => 'required',
            'adresa' => 'required',
            'telefon' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'radno_vreme' => 'required'
        ]);

        $lokacija->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Lokacija uspešno izmenjena.');
    }

    public function destroy(Lokacija $lokacija)
    {
        $lokacija->delete();
        return redirect()->route('dashboard')->with('success', 'Lokacija uspešno obrisana.');
    }

 
    
}
        

   




