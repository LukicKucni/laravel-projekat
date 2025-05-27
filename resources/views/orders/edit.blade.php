@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Moje porudžbine</a></li>
                    <li class="breadcrumb-item active">Izmena porudžbine</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold mb-3">Izmena porudžbine</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 mb-3 mb-md-0">
                            <img src="{{ asset('storage/' . $order->magazine->cover) }}" 
                                 alt="{{ $order->magazine->title }}" 
                                 class="img-fluid rounded">
                        </div>
                        <div class="col-md-9">
                            <h4>{{ $order->magazine->title }}</h4>
                            <p class="text-muted">{{ Str::limit($order->magazine->description, 100) }}</p>
                            <p class="mb-0"><strong>Cena:</strong> {{ $order->magazine->price }} RSD</p>
                        </div>
                    </div>

                    <form action="{{ route('orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="quantity" class="form-label">Količina</label>
                            <div class="input-group" style="max-width: 200px;">
                                <button class="btn btn-outline-secondary" type="button" id="decrease-qty">
                                    <i class="bi bi-dash"></i>
                                </button>
                                <input type="number" name="quantity" id="quantity" class="form-control text-center" 
                                    value="{{ $order->quantity }}" min="1">
                                <button class="btn btn-outline-secondary" type="button" id="increase-qty">
                                    <i class="bi bi-plus"></i>
                                </button>
                            </div>
                            @error('quantity')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>Sačuvaj izmene
                            </button>
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Nazad na porudžbine
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title">Pregled porudžbine</h5>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Cena po komadu:</span>
                        <span>{{ $order->magazine->price }} RSD</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Količina:</span>
                        <span id="qty-display">{{ $order->quantity }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Ukupno:</span>
                        <span class="text-primary" id="total-price">{{ $order->total_price }} RSD</span>
                    </div>
                </div>
            </div>

            <div class="card border-0 bg-light shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title"><i class="bi bi-info-circle me-2"></i>Napomena</h5>
                    <p class="mb-0">Ukupna cena će biti ažurirana nakon što sačuvate izmene porudžbine.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const decreaseBtn = document.getElementById('decrease-qty');
        const increaseBtn = document.getElementById('increase-qty');
        const quantityInput = document.getElementById('quantity');
        const qtyDisplay = document.getElementById('qty-display');
        const totalPriceElement = document.getElementById('total-price');
        const pricePerItem = {{ $order->magazine->price }};
        
        function updateTotal() {
            const qty = parseInt(quantityInput.value);
            qtyDisplay.textContent = qty;
            const total = (qty * pricePerItem).toFixed(2);
            totalPriceElement.textContent = total + ' RSD';
        }
        
        if (decreaseBtn && increaseBtn && quantityInput) {
            decreaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                if (value > 1) {
                    quantityInput.value = value - 1;
                    updateTotal();
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                let value = parseInt(quantityInput.value);
                quantityInput.value = value + 1;
                updateTotal();
            });
            
            quantityInput.addEventListener('change', function() {
                if (parseInt(this.value) < 1) {
                    this.value = 1;
                }
                updateTotal();
            });
        }
    });
</script>
@endsection