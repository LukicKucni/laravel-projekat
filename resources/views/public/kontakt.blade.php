@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Header -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">Kontaktirajte nas</h1>
                <p class="lead">Ovde smo da odgovorimo na sva vaša pitanja. Pošaljite nam poruku i javićemo vam se uskoro.</p>
            </div>
        </div>

        <div class="row g-5 mb-5">
            <!-- Contact Form -->
            <div class="col-md-6">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">Pošaljite poruku</h3>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Vaše ime</label>
                                <input type="text" class="form-control" id="name" placeholder="Unesite vaše ime">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email adresa</label>
                                <input type="email" class="form-control" id="email" placeholder="Unesite email adresu">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Naslov</label>
                                <input type="text" class="form-control" id="subject" placeholder="Naslov poruke">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Poruka</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Unesite vašu poruku"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Pošalji poruku</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="col-md-6">
                <div class="card shadow border-0 mb-4">
                    <div class="card-body p-4">
                        <h3 class="card-title mb-4">Podaci o kompaniji</h3>
                        <div class="d-flex mb-4">
                            <div class="icon-square bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3" style="width: 48px; height: 48px; border-radius: 8px;">
                                <i class="bi bi-building"></i>
                            </div>
                            <div>
                                <h5>Izdavačka kuća "Magazin Plus"</h5>
                                <p class="mb-0">Kompanija osnovana 2005. godine sa ciljem da ponudi kvalitetan sadržaj čitaocima.</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="icon-square bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3" style="width: 48px; height: 48px; border-radius: 8px;">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h5>Adresa</h5>
                                <p class="mb-0">Kralja Petra 22, 11000 Beograd</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="icon-square bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3" style="width: 48px; height: 48px; border-radius: 8px;">
                                <i class="bi bi-telephone"></i>
                            </div>
                            <div>
                                <h5>Telefon</h5>
                                <p class="mb-0">011/123-456</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <div class="icon-square bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3" style="width: 48px; height: 48px; border-radius: 8px;">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p class="mb-0">kontakt@magazinplus.rs</p>
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="icon-square bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3" style="width: 48px; height: 48px; border-radius: 8px;">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div>
                                <h5>Radno vreme</h5>
                                <p class="mb-0">Pon - Pet: 9:00 - 17:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card shadow border-0">
                    <div class="card-body p-0">
                        <div class="ratio ratio-16x9">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.741908011007!2d20.4572733!3d44.817813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a706f8e4f24f7%3A0x34504d68d1442160!2sKnez%20Mihailova!5e0!3m2!1sen!2srs!4v1614442488146!5m2!1sen!2srs"
                                style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow border-0 bg-primary text-white">
                    <div class="card-body p-4 text-center">
                        <h3 class="mb-3">Pratite nas na društvenim mrežama</h3>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-light btn-lg mx-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-light btn-lg mx-2"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="btn btn-light btn-lg mx-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-light btn-lg mx-2"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection