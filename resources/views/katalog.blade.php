@extends('layouts.app')

@section('title', 'Katalog')

@section('content')
<div class="header-spacer" style="height: 100px;"></div>

<div class="container my-5">
    <h2 class="text-center mb-4" style="color: #689f38;">Naša ponuda</h2>

    <div class="row">
        {{-- Sidebar filter --}}
        <div class="col-md-3 mb-4">
            <div class="card p-3 shadow-sm">
                <h5 class="mb-3">Filtriraj</h5>
                <form method="GET">
                    <div class="mb-3">
                        <label class="form-label">Pretraga</label>
                        <input type="text" name="search" class="form-control" placeholder="Naziv ploda" value="{{ request('search') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vrsta ploda</label>
                        <select name="vrsta" class="form-select">
                            <option value="">Sve vrste</option>
                            <option value="Bobicasto voce" {{ request('vrsta') == 'Bobicasto voce' ? 'selected' : '' }}>Bobicasto voće</option>
                            <option value="Gljive" {{ request('vrsta') == 'Gljive' ? 'selected' : '' }}>Gljive</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sortiraj</label>
                        <select name="sort" class="form-select">
                            <option value="">--</option>
                            <option value="cena_asc" {{ request('sort') == 'cena_asc' ? 'selected' : '' }}>Cena: rastuće</option>
                            <option value="cena_desc" {{ request('sort') == 'cena_desc' ? 'selected' : '' }}>Cena: opadajuće</option>
                            <option value="naziv" {{ request('sort') == 'naziv' ? 'selected' : '' }}>Naziv</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Primeni filter</button>
                </form>
            </div>
        </div>

        {{-- Glavna lista proizvoda --}}
        <div class="col-md-9">
            <div class="row g-4">
                @forelse($plodovi as $plod)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm katalog-card">
                        <img src="{{ asset('storage/slike/' . $plod->slika) }}" class="card-img-top" alt="{{ $plod->naziv }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title" style="color: #689f38;">{{ $plod->naziv }}</h5>
                            <p class="card-text">{{ Str::limit($plod->opis, 100) }}</p>
                            <p class="fw-bold">{{ number_format($plod->cena_po_kg, 2) }} RSD / kg</p>
                            <a href="{{ route('plodovi.show', $plod->id) }}" class="btn btn-outline-primary px-3 mt-auto">Detaljnije</a>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">Nema dostupnih plodova.</div>
                </div>
                @endforelse
            </div>

            {{-- Paginacija --}}
            <div class="mt-4">
                {{ $plodovi->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .katalog-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .katalog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>
@endpush
