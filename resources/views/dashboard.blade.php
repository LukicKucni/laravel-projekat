@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- User Welcome Section -->
    <div class="row mb-5">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-3 bg-primary text-center d-flex align-items-center justify-content-center py-4">
                        <div>
                            <div class="avatar-circle mx-auto mb-3">
                                <span class="initials">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <h5 class="text-white mb-0">{{ auth()->user()->name }}</h5>
                            <p class="small text-white-50">Član od {{ auth()->user()->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="card-title mb-0">Dobrodošli nazad!</h2>
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil-square me-1"></i>Uredi profil
                                </a>
                            </div>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center bg-light p-3 rounded">
                                        <i class="bi bi-cart-check fs-3 text-success me-3"></i>
                                        <div>
                                            <h6 class="mb-0">Ukupno porudžbina</h6>
                                            <h3 class="mb-0">{{ $orders->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center bg-light p-3 rounded">
                                        <i class="bi bi-currency-exchange fs-3 text-primary me-3"></i>
                                        <div>
                                            <h6 class="mb-0">Ukupna potrošnja</h6>
                                            <h3 class="mb-0">{{ $orders->sum('total_price') }} RSD</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center bg-light p-3 rounded">
                                        <i class="bi bi-calendar-check fs-3 text-warning me-3"></i>
                                        <div>
                                            <h6 class="mb-0">Poslednja aktivnost</h6>
                                            <h5 class="mb-0">{{ $orders->isNotEmpty() ? $orders->first()->created_at->format('d.m.Y') : 'Nema' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4">Brze akcije</h3>
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="{{ route('orders.index') }}" class="card text-center h-100 text-decoration-none border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="icon-square bg-primary text-white rounded-circle p-2 mx-auto mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-cart fs-3"></i>
                            </div>
                            <h5 class="card-title">Moje porudžbine</h5>
                            <p class="card-text text-muted">Pregled i upravljanje vašim porudžbinama</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/katalog') }}" class="card text-center h-100 text-decoration-none border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="icon-square bg-success text-white rounded-circle p-2 mx-auto mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-book fs-3"></i>
                            </div>
                            <h5 class="card-title">Katalog</h5>
                            <p class="card-text text-muted">Pregledaj ponudu magazina i poruči nove</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('profile.edit') }}" class="card text-center h-100 text-decoration-none border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="icon-square bg-info text-white rounded-circle p-2 mx-auto mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-person-gear fs-3"></i>
                            </div>
                            <h5 class="card-title">Podešavanja</h5>
                            <p class="card-text text-muted">Ažuriraj informacije o profilu i lozinku</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/kontakt') }}" class="card text-center h-100 text-decoration-none border-0 shadow-sm">
                        <div class="card-body p-4">
                            <div class="icon-square bg-warning text-white rounded-circle p-2 mx-auto mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-headset fs-3"></i>
                            </div>
                            <h5 class="card-title">Podrška</h5>
                            <p class="card-text text-muted">Potrebna Vam je pomoć? Kontaktirajte nas</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Nedavne porudžbine</h3>
                <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-arrow-right me-1"></i>Vidi sve porudžbine
                </a>
            </div>

            @if ($orders->isEmpty())
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="py-4">
                            <i class="bi bi-cart-x fs-1 text-muted mb-4"></i>
                            <h4>Nemate nijednu porudžbinu</h4>
                            <p class="text-muted mb-4">Posetite naš katalog i pronađite magazine koji vas zanimaju.</p>
                            <a href="{{ url('/katalog') }}" class="btn btn-primary">
                                <i class="bi bi-book me-2"></i>Pregledaj katalog
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" width="60">#</th>
                                        <th scope="col">Magazin</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">Cena</th>
                                        <th scope="col" width="100">Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->take(5) as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/' . $order->magazine->cover) }}" 
                                                        class="rounded me-3" alt="{{ $order->magazine->title }}" 
                                                        style="width: 45px; height: 60px; object-fit: cover;">
                                                    <div>
                                                        <h6 class="mb-0">{{ $order->magazine->title }}</h6>
                                                        <span class="text-muted small">{{ $order->magazine->category->name ?? 'Bez kategorije' }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'primary' }} rounded-pill">
                                                    {{ $order->status == 'completed' ? 'Završeno' : 'Na čekanju' }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                            <td class="fw-bold">{{ $order->total_price }} RSD</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-outline-secondary">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="{{ url('/magazin/' . $order->magazine->id) }}" class="btn btn-outline-primary">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Any additional JavaScript if needed
</script>

<style>
    .avatar-circle {
        width: 100px;
        height: 100px;
        background-color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .initials {
        font-size: 40px;
        font-weight: bold;
        color: #3d5a80;
    }
    
    .icon-square {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Make cards have a consistent height */
    .card.h-100 {
        transition: transform 0.2s ease-in-out;
    }
    
    .card.h-100:hover {
        transform: translateY(-5px);
    }
</style>
@endsection
