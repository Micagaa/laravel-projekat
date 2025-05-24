@extends('layouts.app')

@section('content')
<div class="container pt-10 mt-3" style="padding-top: 100px;">
    <h2>Izmeni plod</h2>

    <form action="{{ route('plods.update', $plod->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Naziv</label>
            <input type="text" name="naziv" class="form-control" value="{{ $plod->naziv }}" required>
        </div>

        <div class="mb-3">
            <label>Opis</label>
            <textarea name="opis" class="form-control" rows="3" required>{{ $plod->opis }}</textarea>
        </div>

        <div class="mb-3">
            <label>Vrsta</label>
            <select name="vrsta" class="form-control" required>
                <option value="Bobičasto voće" {{ $plod->vrsta === 'Bobičasto voće' ? 'selected' : '' }}>Bobičasto voće</option>
                <option value="Gljive" {{ $plod->vrsta === 'Gljive' ? 'selected' : '' }}>Gljive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Cena po kg</label>
            <input type="number" name="cena_po_kg" step="0.01" class="form-control" value="{{ $plod->cena_po_kg }}" required>
        </div>

        <div class="mb-3">
            <label>Nova slika (opcionalno)</label>
            <input type="file" name="slika" class="form-control">
            @if($plod->slika)
                <div class="mt-2">
                    <strong>Trenutna slika:</strong><br>
                    <img src="{{ asset('storage/' . $plod->slika) }}" alt="{{ $plod->naziv }}" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="istaknuto" value="1" {{ $plod->istaknuto ? 'checked' : '' }}>
            <label class="form-check-label">Istaknuto</label>
        </div>

        <button class="btn btn-primary">Sačuvaj izmene</button>
    </form>
</div>
@endsection


@push('scripts')
<!-- Summernote CSS i JS CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('textarea[name="opis"]').summernote({
            placeholder: 'Unesite opis ploda...',
            tabsize: 2,
            height: 200
        });
    });
</script>
@endpush

