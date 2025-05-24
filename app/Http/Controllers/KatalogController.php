<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plod;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Plod::query();

        // Pretraga po nazivu
        if ($request->filled('search')) {
            $query->where('naziv', 'like', '%' . $request->search . '%');
        }

        // Filtriranje po vrsti
        if ($request->filled('vrsta')) {
            $query->where('vrsta', $request->vrsta);
        }

        // Sortiranje
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'cena_asc':
                    $query->orderBy('cena_po_kg', 'asc');
                    break;
                case 'cena_desc':
                    $query->orderBy('cena_po_kg', 'desc');
                    break;
                case 'naziv':
                    $query->orderBy('naziv', 'asc');
                    break;
            }
        }

        $plodovi = $query->paginate(9);

        return view('katalog', compact('plodovi'));
    }

    public function show($id)
    {
        $plod = Plod::findOrFail($id);
        return view('show', compact('plod'));
    }

        public function create()
        {
            return view('editors.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'naziv' => 'required',
                'opis' => 'required',
                'cena_po_kg' => 'required|numeric',
                'vrsta' => 'required',
                'slika' => 'nullable|image|max:2048',
                'istaknuto' => 'nullable|boolean',
            ]);

            $data = $request->only(['naziv', 'opis', 'cena_po_kg', 'vrsta', 'istaknuto']);

            if ($request->hasFile('slika')) {
                $data['slika'] = $request->file('slika')->store('slike', 'public');
            }

            \App\Models\Plod::create($data);

            return redirect()->route('dashboard')->with('success', 'Plod dodat uspešno.');
        }

        public function edit($id)
        {
            $plod = \App\Models\Plod::findOrFail($id);
            return view('editors.edit', compact('plod'));
        }

        public function update(Request $request, $id)
        {
            $plod = \App\Models\Plod::findOrFail($id);

            $request->validate([
                'naziv' => 'required',
                'opis' => 'required',
                'cena_po_kg' => 'required|numeric',
                'vrsta' => 'required',
                'slika' => 'nullable|image|max:2048',
                'istaknuto' => 'nullable|boolean',
            ]);

            $data = $request->only(['naziv', 'opis', 'cena_po_kg', 'vrsta', 'istaknuto']);

            if ($request->hasFile('slika')) {
                if ($plod->slika && \Storage::disk('public')->exists($plod->slika)) {
                    \Storage::disk('public')->delete($plod->slika);
                }
                $data['slika'] = $request->file('slika')->store('slike', 'public');
            }

            $plod->update($data);

            return redirect()->route('dashboard')->with('success', 'Plod ažuriran uspešno.');
        }

        public function destroy($id)
        {
            $plod = \App\Models\Plod::findOrFail($id);

            // Obrisi sliku ako postoji
            if ($plod->slika && \Storage::disk('public')->exists($plod->slika)) {
                \Storage::disk('public')->delete($plod->slika);
            }

            $plod->delete();

            return redirect()->route('dashboard')->with('success', 'Plod uspešno obrisan.');
        }

        
        
}
