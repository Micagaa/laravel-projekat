<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- JS (ako treba odmah u <head>) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        .form-control-custom {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            padding-left: 15px;
        }
        .form-control-custom:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        .btn-custom {
            height: 50px;
            border-radius: 8px;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    @include('partials.header')

    {{-- Sadržaj stranice --}}
    <main class="py-4 bg-gray-100 min-vh-100 d-flex justify-content-center align-items-center">
        <div class="w-100" style="max-width: 500px;">
            <div class="bg-white shadow-sm rounded-lg p-5">
                <div class="text-center mb-4">
                    <h4 class="font-weight-bold" style="color: #2d3748;">Dobrodošli nazad</h4>
                    <p class="text-muted">Unesite svoje podatke za prijavu</p>
                </div>
                
                {{ $slot }}
                
            </div>
        </div>
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <!-- JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>