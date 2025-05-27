@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="position-relative mb-5">
        <div class="p-5 bg-primary bg-gradient text-white rounded-3 text-center">
            <div class="container py-4">
                <h1 class="display-4 fw-bold text-white">Otkrijte svet magazina</h1>
                <p class="fs-5 mb-4">Najbolji izbor magazina na jednom mestu</p>
                <a href="{{ url('/katalog') }}" class="btn btn-light btn-lg fw-semibold">Pretraži katalog</a>
            </div>
        </div>
    </div>
    
    <!-- Features -->
    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-truck fs-1 text-primary"></i>
                        </div>
                        <h3 class="fs-5">Brza dostava</h3>
                        <p class="mb-0">Dostavljamo na kućnu adresu u roku od 2-3 radna dana.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-shield-check fs-1 text-primary"></i>
                        </div>
                        <h3 class="fs-5">Sigurna kupovina</h3>
                        <p class="mb-0">Garantujemo 100% sigurnost vaših podataka prilikom kupovine.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 h-100 text-center p-4">
                    <div class="card-body">
                        <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-star fs-1 text-primary"></i>
                        </div>
                        <h3 class="fs-5">Kvalitet</h3>
                        <p class="mb-0">Sarađujemo samo sa renomiranim izdavačima i autorima.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="container mb-5">
        <h2 class="display-6 fw-bold mb-4 text-center">Ponuda meseca</h2>
        <div class="row g-4">
            @foreach($featured as $magazine)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $magazine->cover) }}" class="card-img-top" alt="{{ $magazine->title }}">
                            <span class="position-absolute top-0 end-0 badge bg-danger m-2">Izdvajamo</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $magazine->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($magazine->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fs-5 fw-bold text-primary">{{ $magazine->price }} RSD</span>
                                <a href="{{ url('/magazin/' . $magazine->id) }}" class="btn btn-outline-primary">Detaljnije</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/katalog') }}" class="btn btn-lg btn-primary">Pogledaj sve magazine</a>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="container mb-5">
        <div class="p-5 bg-light rounded-3">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <h2>Budite u toku sa novim izdanjima</h2>
                    <p class="mb-4">Prijavite se na našu mejling listu i budite prvi koji će saznati o novim izdanjima i promocijama.</p>
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Vaša email adresa">
                        <button class="btn btn-primary" type="button">Pretplati se</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection