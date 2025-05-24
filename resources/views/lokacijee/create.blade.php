@extends('layouts.app')
@section('content')
<div class="container pt-5">
    <h2>Dodaj lokaciju</h2>
    <form method="POST" action="{{ route('lokacijas.store') }}">
        @csrf
        <input name="naziv" placeholder="Naziv" class="form-control mb-2" required>
        <input name="adresa" placeholder="Adresa" class="form-control mb-2" required>
        <input name="telefon" placeholder="Telefon" class="form-control mb-2" required>
        <input name="lat" placeholder="Latituda" type="number" step="0.000001" class="form-control mb-2" required>
        <input name="lng" placeholder="Longituda" type="number" step="0.000001" class="form-control mb-2" required>
        <input name="radno_vreme" placeholder="Radno vreme" class="form-control mb-2" required>
        <button class="btn btn-success">Sačuvaj</button>
    </form>
</div>
@endsection