@extends('layouts.app')

@section('content')
<div class="header-spacer" style="height: 120px;"></div>

<div class="container">
    <h1 class="mb-4">Dobrodošli na kontrolnu tablu</h1>

    @auth
        <div class="alert alert-info">
            Ulogovani ste kao <strong>{{ Auth::user()->naziv }}</strong>
            (uloga: <strong>{{ Auth::user()->role->name }}</strong>)
        </div>

        @if(Auth::user()->role->name === 'admin')
            {{-- Admin deo --}}
            <a href="{{ route('users.create') }}" class="btn btn-success mb-3" style="color:white; background-color:#84BD00; color: black;">Dodaj korisnika</a>

            <table id="admin-tabela" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Uloga</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->naziv }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm" style="color:white; background-color:#84BD00;color: black;">Izmeni</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

                <div id="chart_div" style="width: 100%; height: 400px;"></div>

        @elseif(Auth::user()->role->name === 'editor')
            {{-- Editor deo --}}
           <a href="{{ route('plods.create') }}" class="btn mb-3" style="background-color:#84BD00; color: black;">Dodaj plod</a>


            <table id="editor-tabela" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Opis</th>
                        <th>Cena (RSD/kg)</th>
                        <th>Vrsta</th>
                        <th>Istaknuto</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plodovi as $plod)
                        <tr>
                            <td>{{ $plod->id }}</td>
                            <td>{{ $plod->naziv }}</td>
                            <td>{{ $plod->opis }}</td>
                            <td>{{ $plod->cena_po_kg }}</td>
                            <td>{{ $plod->vrsta }}</td>
                            <td>{{ $plod->istaknuto ? 'Da' : 'Ne' }}</td>
                            <td>
                                <a href="{{ route('plods.edit', $plod->id) }}" class="btn btn-sm btn-primary">Izmeni</a>
                                <form action="{{ route('plods.destroy', $plod->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni?')">Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Lokacije --}}
            <h3 class="mt-5">Upravljanje otkupnim lokacijama</h3>
           <a href="{{ route('lokacijas.create') }}" class="btn mb-3" style="background-color:#84BD00; color: black;">Dodaj lokaciju</a>


            <table id="lokacije-tabela" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Adresa</th>
                        <th>Telefon</th>
                        <th>Radno vreme</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lokacije as $lokacija)
                        <tr>
                            <td>{{ $lokacija->id }}</td>
                            <td>{{ $lokacija->naziv }}</td>
                            <td>{{ $lokacija->adresa }}</td>
                            <td>{{ $lokacija->telefon }}</td>
                            <td>{{ $lokacija->radno_vreme }}</td>
                            <td>
                                <a href="{{ route('lokacijas.edit', $lokacija->id) }}" class="btn btn-primary btn-sm">Izmeni</a>
                                <form action="{{ route('lokacijas.destroy', $lokacija->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @elseif(Auth::user()->role->name === 'user')
            {{-- User deo --}}
            <h3 class="mt-5">Moje porudžbine</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table id="user-tabela" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plod</th>
                        <th>Količina (kg)</th>
                        <th>Kontakt</th>
                        <th>Akcija</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($porudzbine as $porudzbina)
                        <tr>
                            <td>{{ $porudzbina->id }}</td>
                            <td>{{ $porudzbina->plod->naziv }}</td>
                            <td>{{ $porudzbina->kolicina }}</td>
                            <td>{{ $porudzbina->kontakt }}</td>
                            <td>
                                <form action="{{ route('porudzbine.destroy', $porudzbina->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Obrisati porudžbinu?')">Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endauth
</div>
@endsection

@push('scripts')
<!-- Uključi jQuery i DataTables JS/CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Uključi Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Aktivacija DataTables i Google Chart -->
<script>
    $(document).ready(function () {
        $('#admin-tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
            }
        });
        $('#editor-tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
            }
        });
        $('#lokacije-tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
            }
        });
        $('#user-tabela').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
            }
        });
    });

    // Google Chart za admina
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

 function drawChart() {
    const data = google.visualization.arrayToDataTable([
        ['Mesec', 'Broj porudžbina'],
        @foreach($chartData ?? [] as $item)
            ['{{ \Carbon\Carbon::create()->month($item->mesec)->translatedFormat('F') }}', {{ $item->broj }}],
        @endforeach
    ]);

    const options = {
        title: 'Broj porudžbina po mesecima',
        legend: { position: 'bottom' },
        height: 400,
        colors: ['#84BD00'] // zelena boja
    };

    const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}

</script>
@endpush

