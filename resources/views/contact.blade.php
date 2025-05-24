@extends('layouts.app')

@section('title', 'Kontakt')

@section('content')

<!-- Kontakt forma -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">

                <div class="col-12 text-center">
                    <h2 class="text-primary">Kontaktirajte nas</h2>
                    <p class="mb-4">Pošaljite nam poruku ili nas posetite lično na jednoj od naših lokacija.</p>
                </div>

                <div class="col-12">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23110.172257167604!2d20.216774949999998!3d43.6112984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4757978bf432e759%3A0x387396e93beb622d!2zxaB1bWU!5e0!3m2!1sen!2srs!4v1746051626054!5m2!1sen!2srs" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form method="POST" action="#">
                        @csrf
                        <input type="text" name="ime" class="w-100 form-control border-0 py-3 mb-4" placeholder="Vaše ime" required>
                        <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Vaš email" required>
                        <textarea name="poruka" class="w-100 form-control border-0 mb-4" rows="5" placeholder="Vaša poruka" required></textarea>
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Pošalji poruku</button>
                    </form>
                </div>

                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Adresa</h4>
                            <p class="mb-2">Ivanjica, Srbija</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Email</h4>
                            <p class="mb-2">info@smrcakivanjica.rs</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Telefon</h4>
                            <p class="mb-2">+381 64 123 4567</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection