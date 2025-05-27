@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Category Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Kategorije</h5>
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ url('/katalog') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category_id') ? '' : 'active' }}">
                            Sve kategorije
                            <span class="badge bg-primary rounded-pill">{{ count($magazines) }}</span>
                        </a>
                        @foreach($categories as $cat)
                            <a href="{{ url('/katalog?category_id=' . $cat->id) }}" 
                               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category_id') == $cat->id ? 'active' : '' }}">
                                {{ $cat->name }}
                                <span class="badge bg-primary rounded-pill">
                                    {{ $magazines->where('category_id', $cat->id)->count() }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
                
                <!-- Filter Box -->
                <div class="card mt-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Filtriraj</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="search" class="form-label">Pretraga</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="search" placeholder="Naziv magazina">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Magazine Grid -->
            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="mb-0">Naši Magazini</h1>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Sortiraj po
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Najnovije</a></li>
                            <li><a class="dropdown-item" href="#">Cena: najniža prvo</a></li>
                            <li><a class="dropdown-item" href="#">Cena: najviša prvo</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row g-4">
                    @forelse($magazines as $magazine)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $magazine->cover) }}" class="card-img-top" alt="{{ $magazine->title }}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $magazine->title }}</h5>
                                    <p class="text-muted mb-1">
                                        <i class="bi bi-tag-fill me-1"></i> 
                                        {{ $magazine->category->name ?? 'N/A' }}
                                    </p>
                                    <p class="text-muted mb-2">
                                        <i class="bi bi-calendar-event me-1"></i> 
                                        {{ \Carbon\Carbon::parse($magazine->release_date)->format('d.m.Y') }}
                                    </p>
                                    <div class="mt-auto d-flex justify-content-between align-items-center pt-3">
                                        <span class="fs-5 fw-bold text-primary">{{ $magazine->price }} RSD</span>
                                        <a href="{{ url('/magazin/' . $magazine->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye me-1"></i>Detaljnije
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center p-5">
                                <i class="bi bi-info-circle-fill fs-1 d-block mb-3"></i>
                                <h4>Nema pronađenih magazina</h4>
                                <p class="mb-0">Nema magazina za izabranu kategoriju. Molimo izaberite drugu kategoriju.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
