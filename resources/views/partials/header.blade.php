<!-- Header Start -->
<div class="container-fluid fixed-top px-0">
    <!-- Topbar Section -->
    <div class="topbar bg-primary d-none d-lg-block py-3" style="max-width: 1400px; margin: 0 auto;">
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="top-info text-white">
                    <span class="fs-6"><i class="fas fa-map-marker-alt me-2 text-light"></i> Ivanjica, Srbija</span>
                    <span class="ms-4 fs-6"><i class="fas fa-envelope me-2 text-light"></i> info@smrcakivanjica.rs</span>
                </div>
                <div class="top-link">
                    <a href="#" class="text-white mx-3 fs-6">Pravila</a>
                    <a href="#" class="text-white mx-3 fs-6">Privatnost</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="bg-white" style="max-width: 1400px; margin: 0 auto;">
        <nav class="navbar navbar-light navbar-expand-xl py-3 container-fluid px-4"> <!-- povećan padding na py-3 -->
            <!-- Logo with Company Name -->
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center py-0">
                <img 
                    src="{{ asset('img/logooi.png') }}" 
                    alt="Smrčak DOO Logo" 
                    class="img-fluid me-3" 
                    style="height: 60px; width: auto;" 
                    
                >
                <div>
                    <div class="text-primary fw-bold fs-4 lh-1">Smrčak DOO Ivanjica</div> <!-- povećano sa fs-5 na fs-4 -->
                </div>
            </a>

            <!-- Mobile Menu Button -->
            <button class="btn btn-outline-success d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarNav" aria-controls="sidebarNav">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse d-none d-xl-flex" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link">Početna</a>
                    <a href="{{ route('katalog') }}" class="nav-item nav-link">Katalog</a>
                    <a href="{{ route('lokacije') }}" class="nav-item nav-link">Lokacije</a>
                    <a href="{{ route('kontakt') }}" class="nav-item nav-link">Kontakt</a>
                </div>

                @guest
                    <div class="d-flex gap-2">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary px-3">Prijava</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-outline-primary px-3">Registracija</a>
                    </div>
                @else
                    <div class="d-flex gap-2">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm px-3" style="background-color:#84BD00; color: black;">Panel</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger px-3">Odjavi se</button>
                        </form>
                    </div>
                @endguest
            </div>
        </nav>
    </div>
</div>
<!-- Header End -->