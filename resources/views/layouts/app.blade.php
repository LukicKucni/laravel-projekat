<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Plus - Izdavačka kuća</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
            color: #333 !important;
            background-color: #f8f9fa !important;
        }
        
        #main-nav {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }
        
        #main-nav .brand {
            color: #3d5a80;
            font-weight: 700;
            font-size: 24px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        
        #main-nav .brand i {
            margin-right: 10px;
        }
        
        #main-nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 5px;
        }
        
        #main-nav ul li a,
        #main-nav ul li button {
            display: block;
            color: #3d5a80;
            font-weight: 600;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.2s ease;
        }
        
        #main-nav ul li button {
            background: none;
            border: none;
            font-family: inherit;
            font-size: inherit;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }
        
        #main-nav ul li a:hover,
        #main-nav ul li button:hover {
            color: #ee6c4d;
            background-color: rgba(61, 90, 128, 0.05);
        }
        
        #main-nav ul li a.active,
        #main-nav ul li button.active {
            color: #ee6c4d;
            background-color: rgba(238, 108, 77, 0.1);
            position: relative;
        }
        
        #main-nav ul li a.active:after,
        #main-nav ul li button.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background-color: #ee6c4d;
        }
        
        #mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #3d5a80;
            cursor: pointer;
        }
        
        @media (max-width: 991px) {
            #mobile-menu-btn {
                display: block;
            }
            
            #main-nav .nav-menu {
                display: none;
                width: 100%;
                padding-top: 20px;
            }
            
            #main-nav .nav-menu.show {
                display: block;
            }
            
            #main-nav ul {
                flex-direction: column;
                width: 100%;
            }
            
            #main-nav .container {
                flex-wrap: wrap;
            }
        }
        
        #main-nav .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 25px 15px;
        }
        
        .btn-primary {
            background-color: #3d5a80 !important;
            border-color: #3d5a80 !important;
            color: white !important;
        }
        
        .btn-primary:hover {
            background-color: #2c3e50 !important;
            border-color: #2c3e50 !important;
        }
        
        .footer {
            background-color: #3d5a80;
            color: #fff;
            padding: 40px 0 20px;
            margin-top: 60px;
        }
        
        .footer a {
            color: white;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        .card {
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08) !important;
            transition: transform 0.3s ease !important;
        }
        
        .card:hover {
            transform: translateY(-5px) !important;
        }
    </style>
</head>

<body>
    <nav id="main-nav">
        <div class="container">
            <a href="{{ url('/') }}" class="brand">
                <i class="bi bi-book"></i>Magazin Plus
            </a>
            
            <button id="mobile-menu-btn" aria-label="Toggle mobile menu">
                <i class="bi bi-list"></i>
            </button>
            
            <div class="nav-menu">
                <ul>
                    <li>
                        <a href="{{ url('/') }}" class="{{ request()->is('/') || request()->is('home') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i> Početna
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/katalog') }}" class="{{ request()->is('katalog*') ? 'active' : '' }}">
                            <i class="bi bi-grid"></i> Katalog
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/kontakt') }}" class="{{ request()->is('kontakt') ? 'active' : '' }}">
                            <i class="bi bi-envelope"></i> Kontakt
                        </a>
                    </li>
                    
                    @auth
                        @if(auth()->user()->role === 'Admin')
                            <li>
                                <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin*') ? 'active' : '' }}">
                                    <i class="bi bi-speedometer2"></i> Admin Panel
                                </a>
                            </li>
                        @endif
                        
                        <li>
                            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                                <i class="bi bi-person"></i> Moj nalog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('orders.index') }}" class="{{ request()->is('porudzbine*') ? 'active' : '' }}">
                                <i class="bi bi-cart"></i> Moje porudžbine
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">
                                    <i class="bi bi-box-arrow-right"></i> Odjava
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="{{ request()->is('login') ? 'active' : '' }}">
                                <i class="bi bi-box-arrow-in-right"></i> Prijava
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="{{ request()->is('register') ? 'active' : '' }}">
                                <i class="bi bi-person-plus"></i> Registracija
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>O nama</h5>
                    <p>Magazin Plus je izdavačka kuća posvećena kvalitetnom sadržaju i širokom izboru magazina za sve čitaoce.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Brzi linkovi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Početna</a></li>
                        <li><a href="{{ url('/katalog') }}">Katalog</a></li>
                        <li><a href="{{ url('/kontakt') }}">Kontakt</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Kontakt</h5>
                    <address>
                        <p><i class="bi bi-geo-alt me-2"></i> Kralja Petra 22, 11000 Beograd</p>
                        <p><i class="bi bi-telephone me-2"></i> 011/123-456</p>
                        <p><i class="bi bi-envelope me-2"></i> kontakt@magazinplus.rs</p>
                    </address>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <p class="text-center">&copy; {{ date('Y') }} Magazin Plus - Sva prava zadržana</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script src="https:////cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const navMenu = document.querySelector('.nav-menu');
            
            if (mobileMenuBtn && navMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    navMenu.classList.toggle('show');
                });
            }
            
            // Initialize Summernote
            if (jQuery().summernote) {
                $('.summernote').summernote({
                    height: 300,
                    tabsize: 2,
                    placeholder: 'Unesite detaljan opis...',
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>