@extends('layouts.app')

@section('content')
<div class="container pt-10 mt-3" style="padding-top: 100px;">
    <h2>Dodaj novi plod</h2>

    <form action="{{ route('plods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Naziv</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Opis</label>
            <textarea name="opis" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Vrsta</label>
            <select name="vrsta" class="form-control" required>
                <option value="">-- Izaberi vrstu --</option>
                <option value="Bobičasto voće">Bobičasto voće</option>
                <option value="Gljive">Gljive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Cena po kg</label>
            <input type="number" name="cena_po_kg" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Slika</label>
            <input type="file" name="slika" class="form-control">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="istaknuto" value="1">
            <label class="form-check-label">Istaknuto</label>
        </div>

        <button class="btn btn-success">Sačuvaj</button>
    </form>
</div>
@endsection