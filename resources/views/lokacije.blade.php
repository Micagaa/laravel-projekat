@extends('layouts.app')

@section('title', 'Otkupne lokacije')

@section('content')
<div class="header-spacer" style="height: 100px;"></div>

<div class="container my-5">
    <h2 class="text-center mb-4">Naše otkupne lokacije</h2>

    {{-- Lista lokacija u karticama --}}
    <div class="row g-4 mb-5">
        @foreach($lokacije as $lokacija)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $lokacija->naziv }}</h5>
                    <p class="mb-1"><strong>Adresa:</strong> {{ $lokacija->adresa }}</p>
                    <p class="mb-1"><strong>Telefon:</strong> {{ $lokacija->telefon }}</p>
                    <p class="mb-1"><strong>Radno vreme:</strong> {{ $lokacija->radno_vreme }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Mapa sa markerima --}}
    <h4 class="text-center mb-3">Prikaz na mapi</h4>
    <div id="map" style="height: 500px; border-radius: 10px; overflow: hidden;"></div>
</div>
@endsection

@push('styles')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"/>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const map = L.map('map').setView([43.9, 20.9], 7); // Centar Srbije

        // Dodavanje osnovne OpenStreetMap mape
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Marker za svaku lokaciju iz baze
        @foreach($lokacije as $lok)
        L.marker([{{ $lok->lat }}, {{ $lok->lng }}])
            .addTo(map)
            .bindPopup(`<strong>{{ $lok->naziv }}</strong><br>{{ $lok->adresa }}`);
        @endforeach
    });
</script>
@endpush
