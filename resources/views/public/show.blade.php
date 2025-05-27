@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/katalog') }}">Katalog</a></li>
            <li class="breadcrumb-item active">{{ $magazine->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="card border-0 shadow">
                <img src="{{ asset('storage/' . $magazine->cover) }}" class="img-fluid rounded" alt="{{ $magazine->title }}">
            </div>
        </div>
        <div class="col-lg-7">
            <h1 class="mb-3">{{ $magazine->title }}</h1>
            
            <div class="mb-4">
                <span class="badge bg-primary me-2">
                    <i class="bi bi-tag-fill me-1"></i>{{ $magazine->category->name ?? 'N/A' }}
                </span>
                <span class="badge bg-secondary">
                    <i class="bi bi-calendar-event me-1"></i>{{ \Carbon\Carbon::parse($magazine->release_date)->format('d.m.Y') }}
                </span>
            </div>
            
            <div class="d-flex align-items-center mb-4">
                <h3 class="text-primary fw-bold mb-0">{{ $magazine->price }} RSD</h3>
                <span class="badge bg-success ms-3">Dostupno</span>
            </div>
            
            @auth
                <form action="{{ route('orders.store', $magazine->id) }}" method="POST" class="mb-4">
                    @csrf
                    <div class="d-flex">
                        <div class="input-group me-3" style="width: 130px;">
                            <button class="btn btn-outline-secondary" type="button" id="decrease-qty">-</button>
                            <input type="number" name="quantity" class="form-control text-center" value="1" min="1" id="qty-input">
                            <button class="btn btn-outline-secondary" type="button" id="increase-qty">+</button>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-cart-plus me-1"></i>Dodaj u korpu
                        </button>
                    </div>
                </form>
            @else
                <div class="alert alert-info d-flex align-items-center" role="alert">
                    <i class="bi bi-info-circle-fill me-2 fs-4"></i>
                    <div>
                        Da biste poručili magazin, morate biti <a href="{{ route('login') }}" class="alert-link">prijavljeni</a>.
                    </div>
                </div>
            @endauth
            
            <div class="mb-4">
                <h4>Opis</h4>
                <div class="card border-0 bg-light p-3 rounded">
                    <p class="mb-0">{{ $magazine->description }}</p>
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ url('/katalog') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Nazad na katalog
                </a>
                
                <div class="d-flex">
                    <button class="btn btn-outline-primary me-2" title="Podeli na Facebook">
                        <i class="bi bi-facebook"></i>
                    </button>
                    <button class="btn btn-outline-primary me-2" title="Podeli na Twitter">
                        <i class="bi bi-twitter"></i>
                    </button>
                    <button class="btn btn-outline-primary" title="Podeli na Instagram">
                        <i class="bi bi-instagram"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    <div class="mt-5">
        <h3 class="mb-4">Možda će Vas zanimati</h3>
        <div class="row g-4">
            <!-- You can load related magazines here dynamically -->
            <!-- This is just a placeholder -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $magazine->cover) }}" class="card-img-top" alt="Povezani magazin">
                    <div class="card-body">
                        <h5 class="card-title">Povezani magazin</h5>
                        <p class="fw-bold text-primary">850 RSD</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Detaljnije</a>
                    </div>
                </div>
            </div>
            <!-- End placeholder -->
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const decreaseBtn = document.getElementById('decrease-qty');
        const increaseBtn = document.getElementById('increase-qty');
        const qtyInput = document.getElementById('qty-input');
        
        if (decreaseBtn && increaseBtn && qtyInput) {
            decreaseBtn.addEventListener('click', function() {
                let value = parseInt(qtyInput.value);
                if (value > 1) qtyInput.value = value - 1;
            });
            
            increaseBtn.addEventListener('click', function() {
                let value = parseInt(qtyInput.value);
                qtyInput.value = value + 1;
            });
        }
    });
</script>
@endsection