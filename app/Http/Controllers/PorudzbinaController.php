<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Porudzbina;
use Illuminate\Http\Request;

class PorudzbinaController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'kolicina' => 'required|integer|min:1',
            'kontakt' => 'required|string|max:255',
        ]);

        Porudzbina::create([
            'user_id' => Auth::id(),
            'plod_id' => $id,
            'kolicina' => $request->kolicina,
            'kontakt' => $request->kontakt
        ]);

        return redirect()->back()->with('success', 'Uspešno ste poručili plod.');
    }


    public function destroy($id)
    {
        $porudzbina = Porudzbina::findOrFail($id);

        if (auth()->id() !== $porudzbina->user_id) {
            abort(403);
        }

        $porudzbina->delete();

        return redirect()->route('dashboard')->with('success', 'Porudžbina obrisana.');
    }

}
