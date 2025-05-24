@extends('layouts.app')

@section('content')
<div class="header-spacer" style="height: 120px;"></div>

<div class="container">
    <h2>Izmeni korisnika</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Ime</label>
            <input type="text" name="naziv" class="form-control" value="{{ $user->naziv }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Uloga</label>
            <select name="role_id" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Ažuriraj</button>
    </form>
</div>
@endsection
