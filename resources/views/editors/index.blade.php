@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 100px;">
    <h2 class="mb-4">Upravljanje plodovima</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('plods.create') }}" class="btn btn-success mb-3">Dodaj novi plod</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Vrsta</th>
                <th>Cena (RSD/kg)</th>
                <th>Slika</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($plodovi as $plod)
            <tr>
                <td>{{ $plod->id }}</td>
                <td>{{ $plod->naziv }}</td>
                <td>{{ $plod->vrsta }}</td>
                <td>{{ number_format($plod->cena_po_kg, 2) }}</td>
                <td>
                    @if($plod->slika)
                        <img src="{{ asset('storage/' . $plod->slika) }}" width="60" height="60" class="rounded">
                    @else
                        Nema slike
                    @endif
                </td>
                <td>
                    <a href="{{ route('plods.edit', $plod->id) }}" class="btn btn-primary btn-sm">Izmeni</a>
                    <form action="{{ route('plods.destroy', $plod->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni?')">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
