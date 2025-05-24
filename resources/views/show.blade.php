@extends('layouts.app')

@section('title', $plod->naziv)

@section('content')
<!-- Spacer ispod fiksiranog hedera -->
<div class="header-spacer" style="height: 100px;"></div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/slike/' . $plod->slika) }}" class="img-fluid rounded" alt="{{ $plod->naziv }}">
        </div>
        <div class="col-md-6">
            <h2 style="color: #689f38;">{{ $plod->naziv }}</h2>
            <p class="lead">{{ $plod->opis }}</p>
            <p><strong>Vrsta:</strong> {{ $plod->vrsta }}</p>
            <p><strong>Cena:</strong> {{ number_format($plod->cena_po_kg, 2) }} RSD / kg</p>
            <a href="{{ route('katalog') }}" class="btn btn-sm btn-outline-primary px-3">Nazad na katalog</a>
        </div>
    </div>

            @auth
        @if(Auth::user()->role->name === 'user')
            <h4>Poruči ovaj plod</h4>
            <form action="{{ route('porudzbine.store', $plod->id) }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label>Količina (kg)</label>
                    <input type="number" name="kolicina" min="1" required class="form-control">
                </div>
                <div class="mb-2">
                    <label>Kontakt (telefon ili email)</label>
                    <input type="text" name="kontakt" required class="form-control" >
                </div>
                <button type="submit" class="btn btn-sm btn-outline-primary px-3">Pošalji narudžbinu</button>
            </form>
        @endif
    @endauth

</div>
@endsection


