@extends('layouts.app')
@section('content')
<div class="container pt-5">
    <h2>Izmeni lokaciju</h2>
    <form method="POST" action="{{ route('lokacijas.update', $lokacija->id) }}">
        @csrf
        @method('PUT')
        <input name="naziv" value="{{ $lokacija->naziv }}" class="form-control mb-2" required>
        <input name="adresa" value="{{ $lokacija->adresa }}" class="form-control mb-2" required>
        <input name="telefon" value="{{ $lokacija->telefon }}" class="form-control mb-2" required>
        <input name="lat" value="{{ $lokacija->lat }}" type="number" step="0.000001" class="form-control mb-2" required>
        <input name="lng" value="{{ $lokacija->lng }}" type="number" step="0.000001" class="form-control mb-2" required>
        <input name="radno_vreme" value="{{ $lokacija->radno_vreme }}" class="form-control mb-2" required>
        <button class="btn btn-primary">Ažuriraj</button>
    </form>
</div>
@endsection