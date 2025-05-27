@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Početna</a></li>
                    <li class="breadcrumb-item active">Admin Panel</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="display-5 fw-bold mb-0">Admin Panel</h1>
                <a href="{{ url('/') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-2"></i>Nazad na sajt
                </a>
            </div>
            <p class="text-muted">Upravljajte magazinima, kategorijama i porudžbinama</p>
        </div>
    </div>

    <!-- Admin stats cards -->
    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar bg-primary bg-opacity-10 text-primary rounded-circle p-3">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted small fw-normal mb-0">Ukupno korisnika</h6>
                            <h3 class="mb-0">{{ \App\Models\User::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar bg-success bg-opacity-10 text-success rounded-circle p-3">
                                <i class="bi bi-journal-richtext fs-3"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted small fw-normal mb-0">Ukupno magazina</h6>
                            <h3 class="mb-0">{{ \App\Models\Magazine::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                                <i class="bi bi-cart-check-fill fs-3"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted small fw-normal mb-0">Ukupno porudžbina</h6>
                            <h3 class="mb-0">{{ \App\Models\Order::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar bg-info bg-opacity-10 text-info rounded-circle p-3">
                                <i class="bi bi-tag-fill fs-3"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-muted small fw-normal mb-0">Ukupno kategorija</h6>
                            <h3 class="mb-0">{{ \App\Models\Category::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Actions -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4">Upravljanje sadržajem</h3>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-md-4 border-end">
                            <div class="p-4 text-center">
                                <div class="admin-icon rounded-circle bg-primary text-white mx-auto mb-3">
                                    <i class="bi bi-journals fs-2"></i>
                                </div>
                                <h4 class="mb-3">Magazini</h4>
                                <p class="text-muted mb-4">Dodajte, izmenite ili obrišite magazine u katalogu</p>
                                <a href="{{ route('admin.magazines.index') }}" class="btn btn-primary px-4">
                                    <i class="bi bi-pencil-square me-2"></i>Upravljaj magazinima
                                </a>
                                <hr class="d-md-none my-4">
                            </div>
                        </div>
                        <div class="col-md-4 border-end">
                            <div class="p-4 text-center">
                                <div class="admin-icon rounded-circle bg-success text-white mx-auto mb-3">
                                    <i class="bi bi-tags fs-2"></i>
                                </div>
                                <h4 class="mb-3">Kategorije</h4>
                                <p class="text-muted mb-4">Organizujte magazine u kategorije za bolju preglednost</p>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-success px-4">
                                    <i class="bi bi-folder-plus me-2"></i>Upravljaj kategorijama
                                </a>
                                <hr class="d-md-none my-4">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-4 text-center">
                                <div class="admin-icon rounded-circle bg-warning text-white mx-auto mb-3">
                                    <i class="bi bi-cart-check fs-2"></i>
                                </div>
                                <h4 class="mb-3">Porudžbine</h4>
                                <p class="text-muted mb-4">Pregledajte i upravljajte porudžbinama korisnika</p>
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-warning px-4">
                                    <i class="bi bi-list-check me-2"></i>Pregled porudžbina
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Orders & Users -->
    <div class="row g-4">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center p-3">
                    <h5 class="mb-0"><i class="bi bi-cart3 me-2 text-primary"></i>Najnovije porudžbine</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">Vidi sve</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Korisnik</th>
                                    <th scope="col">Magazin</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-end">Iznos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Models\Order::with(['user', 'magazine'])->latest()->take(5)->get() as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->magazine->title }}</td>
                                    <td>
                                        @if($order->status == 'completed')
                                            <span class="badge bg-success">Završeno</span>
                                        @else
                                            <span class="badge bg-primary">Na čekanju</span>
                                        @endif
                                    </td>
                                    <td class="text-end">{{ $order->total_price }} RSD</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center p-3">
                    <h5 class="mb-0"><i class="bi bi-people me-2 text-primary"></i>Najnoviji korisnici</h5>
                    <span class="badge bg-primary rounded-pill">{{ \App\Models\User::count() }} ukupno</span>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                        <div class="list-group-item d-flex align-items-center">
                            <div class="user-avatar me-3 bg-light rounded-circle text-center" style="width: 40px; height: 40px; line-height: 40px;">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
                            <div class="flex-shrink-0">
                                <small class="text-muted">{{ $user->created_at->format('d.m.Y') }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer bg-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Ukupno {{ \App\Models\User::count() }} korisnika</small>
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-person-plus me-1"></i>Dodaj korisnika
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<style>
    .avatar {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .admin-icon {
        width: 80px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Make cards have a consistent hover effect */
    .card {
        transition: transform 0.2s ease-in-out;
    }
    
    /* Adjustments for responsive tables */
    @media (max-width: 768px) {
        .table {
            font-size: 0.9rem;
        }
    }
</style>

<script>
    // We could add dashboard-specific JavaScript here
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Admin dashboard loaded');
    });
</script>
@endsection