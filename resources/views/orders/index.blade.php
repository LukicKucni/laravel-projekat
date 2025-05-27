@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
                    <li class="breadcrumb-item active">Moje porudžbine</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold mb-3">Moje porudžbine</h1>
            <p class="text-muted">Pregled i upravljanje vašim porudžbinama</p>
        </div>
    </div>

    @forelse ($orders as $order)
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <div>
                    <span class="badge bg-secondary me-2">Porudžbina #{{ $order->id }}</span>
                    <span class="text-muted small">{{ $order->created_at->format('d.m.Y. H:i') }}</span>
                </div>
                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'primary' }}">
                    {{ $order->status == 'completed' ? 'Završeno' : 'Na čekanju' }}
                </span>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-3 mb-3 mb-md-0">
                        <img src="{{ asset('storage/' . $order->magazine->cover) }}" 
                             alt="{{ $order->magazine->title }}" 
                             class="img-fluid rounded" 
                             style="max-height: 100px; width: auto;">
                    </div>
                    <div class="col-md-7 col-sm-9 mb-3 mb-md-0">
                        <h5 class="mb-1">{{ $order->magazine->title }}</h5>
                        <p class="mb-1 text-muted small">
                            <i class="bi bi-tag-fill me-1"></i>{{ $order->magazine->category->name ?? 'N/A' }}
                        </p>
                        <div class="d-flex align-items-center mt-2">
                            <span class="me-3"><strong>Cena:</strong> {{ $order->magazine->price }} RSD</span>
                            <span class="me-3"><strong>Količina:</strong> {{ $order->quantity }}</span>
                            <span class=""><strong>Ukupno:</strong> <span class="text-primary fw-bold">{{ $order->total_price }} RSD</span></span>
                        </div>
                    </div>
                    <div class="col-md-3 text-md-end mt-3 mt-md-0">
                        <div class="d-flex flex-column flex-md-row justify-content-md-end gap-2">
                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil me-1"></i>Izmeni
                            </a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                onsubmit="return confirm('Da li ste sigurni da želite obrisati porudžbinu?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>Obriši
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="card border-0 shadow-sm">
            <div class="card-body p-5 text-center">
                <div class="py-4">
                    <i class="bi bi-cart-x fs-1 text-muted mb-4"></i>
                    <h3>Vaša korpa je prazna</h3>
                    <p class="text-muted mb-4">Nemate nijednu porudžbinu u korpi. Pretražite naš katalog i pronađite magazine koji vas interesuju.</p>
                    <a href="{{ url('/katalog') }}" class="btn btn-primary">
                        <i class="bi bi-book me-2"></i>Pregledaj katalog
                    </a>
                </div>
            </div>
        </div>
    @endforelse

    @if($orders->isNotEmpty())
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">Pregled porudžbine</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-md-end align-items-center">
                            <div class="me-4">
                                <p class="mb-0">Ukupan broj magazina: <strong>{{ $orders->sum('quantity') }}</strong></p>
                                <h4 class="mb-0 text-primary">Ukupno za plaćanje: <strong>{{ $orders->sum('total_price') }} RSD</strong></h4>
                            </div>
                            <form action="{{ route('orders.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-credit-card me-2"></i>Završi porudžbinu
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 bg-light shadow-sm">
            <div class="card-body p-4">
                <h5><i class="bi bi-info-circle me-2"></i>Informacije o dostavi</h5>
                <p class="mb-1">Vaša porudžbina će biti isporučena na adresu iz vašeg korisničkog profila.</p>
                <p class="mb-1">Rok isporuke je 2-3 radna dana od momenta završetka porudžbine.</p>
                <p class="mb-0">Za sva pitanja možete nas kontaktirati na <a href="mailto:podrska@magazinplus.rs">podrska@magazinplus.rs</a> ili telefonom na 011/123-456.</p>
            </div>
        </div>
    @endif
</div>
@endsection