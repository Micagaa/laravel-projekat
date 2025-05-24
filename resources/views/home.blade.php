@extends('layouts.app')

@section('content')
<div class="header-spacer" style="height: 100px;"></div>

<div class="hero-section py-5" style="background-color: #f1f8e9; border-radius: 15px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4" style="color: #689f38;">100% Organski Proizvodi</h1>
                <p class="lead text-muted mb-4">Organski povrće i voće iz srpskih šuma i polja</p>
                <div class="search-box input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pretražite proizvode...">
                    <button class="btn" style="background-color: #8bc34a; color:black;" type="button">Pretraži</button>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('img/organski.jpg') }}" class="img-fluid rounded" alt="Organski proizvodi" style="border-radius: 15px;">
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="section-title text-center mb-5">
        <h2 style="color: #689f38;">Naši Izdvojeni Proizvodi</h2>
        <div class="border-top" style="border-color: #8bc34a !important; width: 25%; margin: 1rem auto;"></div>
    </div>

    <div class="row justify-content-center g-4">
        @foreach($plodovi as $plod)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-img-top-container" style="height: 200px; overflow: hidden; border-radius: 15px 15px 0 0;">
                    {{-- Pretpostavka: Ako slika nije null, prikaži je, inače prikaži placeholder --}}
                    @if($plod->slika)
                        <img src="{{ asset('storage/slike/' . $plod->slika) }}" alt="{{ $plod->naziv }}">
                    @else
                        {{-- Možete dodati putanju do default/placeholder slike ovde --}}
                        <img src="{{ asset('img/placeholder-image.png') }}" alt="{{ $plod->naziv }}">
                    @endif
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title" style="color:#84BD00;">{{ $plod->naziv }}</h5>
                    {{-- Prikazujemo samo deo opisa ako je predugačak --}}
                    <p class="card-text text-muted">{{ Str::limit($plod->opis, 50) }}</p>
                    {{-- IZMENJENO DUGME: Uklonjen inline stil, dodata nova klasa --}}
                    <a href="{{ route('plodovi.show', $plod->id) }}" class="btn btn-sm btn-outline-primary px-3">Detalji</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="about-section py-5" style="background-color: #f1f8e9; border-radius: 15px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 style="color: #689f38; margin-bottom: 1.5rem;">O Nama</h2>
                <p class="lead" style="color: #33691e;">Posvećeni smo pružanju najkvalitetnijih organskih proizvoda</p>
                <p>Naša priča počinje u srcu Srbije, gde se tradicija susreće sa modernim načinima gajenja. Svaki naš proizvod je pažljivo odabran i negovan bez upotrebe veštačkih đubriva ili pesticida.</p>
                <p>Verujemo u održivu poljoprivredu i podržavamo lokalne proizvođače. Naš cilj je da na vaš sto donesemo autentičan ukus prirode.</p>
                {{-- Dodajte ispravnu rutu za "Saznajte više" ako je imate --}}
                <a href="#" class="btn btn-sm btn-outline-primary px-3" style="background-color: #8bc34a;color: black;">Saznajte više</a>
            </div>
            <div class="col-lg-6">
                <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel" style="border-radius: 15px;">
                    <div class="carousel-inner rounded" style="border-radius: 15px;">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/keroselm1.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; border-radius: 15px;" alt="Farm">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/keroselm2.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; border-radius: 15px;" alt="Harvest">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/keroselm3.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover; border-radius: 15px;" alt="Products">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid testimonial py-5" ">
    <div class="container py-5">
        <div class="section-title text-center mb-5">
            <h2 style="color: #689f38;">Šta Kažu Naši Kupci</h2>
            <div class="border-top" style="border-color: #8bc34a !important; width: 25%; margin: 1rem auto;"></div>
        </div>

        {{-- Proverite da li je Owl Carousel JS i CSS učitan u vašem glavnom layoutu (layouts.app) --}}
        {{-- Ako nije, potrebno je dodati linkove za Owl Carousel CSS u <head> i JS pre kraja <body> --}}
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">"Kvalitet povrća je neverovatan! Svaki put kada naručim, dobijem sveže i ukusne proizvode. Preporučujem svima koji cene organsku ishranu."</p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('img/avatarmusko.jpeg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="Milan Petrović">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Matija Zagorac (kum)</h4>
                            <p class="m-0 pb-3">Kuvar</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">"Kao mama dvoje dece, važno mi je da moja porodica jede zdravo. Vaši proizvodi su uvek sveži i pouzdani. Hvala što postojite!"</p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('img/avatarzena.jpeg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="Ana Marković">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Maša Stojanović</h4>
                            <p class="m-0 pb-3">Domaćica</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">"Kao vlasnik restorana, tražim samo najkvalitetnije sastojke. Vaši organski proizvodi su postali neizostavni deo našeg menija. Bravo!"</p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('img/avatarmusko.jpeg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="Nikola Jovanović">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Danilo Ćurčić</h4>
                            <p class="m-0 pb-3">Vlasnik restorana</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">"Dostava je uvek brza, a pakovanje pažljivo. Voće iz vašeg sada je redovna nabavka za moju prodavnicu zdravih namirnica."</p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="{{ asset('img/avatarzena.jpeg') }}" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="Jelena Stanković">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Tamara Lukovic</h4>
                            <p class="m-0 pb-3">Vlasnik prodavnice</p>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
{{-- Proverite da li je Owl Carousel CSS učitan u layouts.app ili ga dodajte ovde --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
{{-- FontAwesome za zvezdice i ikonice (ako već nije učitan) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .header-spacer {
        /* Možda je bolje da ovo rešite u glavnom CSS-u ili layoutu umesto inline stila */
        /* margin-top: 80px; */
    }
    .hero-section {
        padding: 60px 0; /* Malo smanjen padding */
    }
    .search-box .form-control {
        height: 50px;
        border-radius: 25px 0 0 25px;
        border-right: none; /* Uklanja duplu ivicu */
    }
    .search-box .btn {
        border-radius: 0 25px 25px 0;
        padding: 0 25px;
        height: 50px; /* Ista visina kao input */
        border: 1px solid #8bc34a; /* Dodajemo ivicu radi doslednosti */
    }
    .search-box .form-control:focus {
         box-shadow: none; /* Uklanja default focus glow */
         border-color: #8bc34a;
    }

    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Dodajemo i tranziciju za senku */
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* Stil za omotač slike kartice */
    .card-img-top-container img {
        width: 100%;
        height: 200px; /* Fiksna visina */
        object-fit: cover; /* Da slika pokrije prostor bez deformacije */
        border-radius: 15px 15px 0 0; /* Zaobljene gornje ivice */
    }

    /* Testimonial Carousel Styling */
    .testimonial {
        position: relative;
    }
    .testimonial-item {
        padding: 30px;
        margin: 0 15px; /* Razmak između elemenata */
        transition: all 0.3s ease;
    }
    .testimonial-item:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        /* Možda ne treba transform ovde da ne skaču */
        /* transform: translateY(-5px); */
    }
    .testimonial-carousel .owl-item img {
        width: 100px !important; /* !important da premosti inline stil ako ga Owl dodaje */
        height: 100px;
        object-fit: cover;
        border-radius: 50%; /* Okrugle slike */
    }
    .testimonial-carousel .owl-nav {
        position: absolute;
        top: 50%;
        width: 100%;
        /* Uklanjamo default prikaz strelica - prilagodite po potrebi */
         display: none;
    }

   

    /* --- DODATO: Stil za novo dugme ('Detalji') --- */
    .btn-theme-outline {
        color: #689f38; /* Tamno zelena boja teksta (iz naslova) */
        border-color: #689f38; /* Tamno zelena boja ivice */
        border-width: 2px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-theme-outline:hover,
    .btn-theme-outline:focus, /* Dodajemo i focus za pristupačnost */
    .btn-theme-outline:active { /* Dodajemo i active stanje */
        color: #ffffff; /* Bela boja teksta na hover */
        background-color: #689f38; /* Tamno zelena pozadina na hover */
        border-color: #689f38; /* Ivica ostaje ista tamno zelena */
        box-shadow: none; /* Uklanjamo podrazumevani box-shadow na focus/active */
    }
    /* --- KRAJ DODATOG STILA --- */

</style>
@endpush

@push('scripts')
{{-- Pretpostavka je da je jQuery već učitan u layouts.app --}}
{{-- Ako nije, dodajte: //<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $(".testimonial-carousel").owlCarousel({
            loop: true,
            margin: 30, // Povećan razmak za bolji izgled sa senkom
            autoplay: true,
            autoplayTimeout: 6000, // Malo duže vreme
            autoplayHoverPause: true, // Pauzira na hover
            nav: false, // Isključene strelice (možete uključiti ako želite)
            dots: true, // Uključene tačkice
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3 // Prikazuje 3 na većim ekranima
                }
            }
        });
    });
</script>
@endpush