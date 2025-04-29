<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Luxury Jewelry') }} - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair+display:400,700|montserrat:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Custom CSS -->
        <style>
            :root {
                --gold: #D4AF37;
                --dark-gold: #B8860B;
                --dark: #1A1A1A;
                --light: #FFFFFF;
            }

            body {
                font-family: 'Montserrat', sans-serif;
                color: var(--dark);
                background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.95) 100%),
                            url('https://images.unsplash.com/photo-1515405295579-ba7b45403062?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            main {
                flex: 1;
                padding: 2rem 0;
            }

            .luxury-font {
                font-family: 'Playfair Display', serif;
            }

            .btn-luxury {
                background-color: var(--gold);
                color: var(--light);
                border: none;
                padding: 0.8rem 2rem;
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 1px;
                transition: all 0.3s ease;
                border-radius: 8px;
            }

            .btn-luxury:hover {
                background-color: var(--dark-gold);
                color: var(--light);
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            }

            .card-luxury {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .card-luxury:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            }

            .form-control {
                border: 1px solid rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                padding: 0.8rem 1rem;
                font-size: 0.95rem;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: var(--gold);
                box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
            }

            .form-label {
                font-weight: 500;
                color: var(--dark);
                margin-bottom: 0.5rem;
            }

            .text-primary-gold {
                color: var(--gold);
            }

            .text-secondary-gold {
                color: var(--dark-gold);
            }

            .image-container {
                position: relative;
                overflow: hidden;
                border-radius: 8px;
                height: 300px;
            }

            .image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .image-container:hover img {
                transform: scale(1.05);
            }

            .navbar {
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(10px);
                position: relative;
                z-index: 1030;
            }

            .navbar-brand {
                font-size: 1.5rem;
                color: var(--gold) !important;
            }

            .nav-link {
                color: var(--dark) !important;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .nav-link:hover {
                color: var(--gold) !important;
            }

            .dropdown-menu {
                border: none;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                z-index: 1031;
            }

            .dropdown-item {
                padding: 0.8rem 1.5rem;
                transition: all 0.3s ease;
            }

            .dropdown-item:hover {
                background-color: rgba(212, 175, 55, 0.1);
                color: var(--gold);
            }

            footer {
                background: rgba(255, 255, 255, 0.95) !important;
                backdrop-filter: blur(10px);
                margin-top: auto;
            }

            @media (max-width: 768px) {
                .image-container {
                    height: 200px;
                }
                
                main {
                    padding: 1rem 0;
                }
            }
        </style>
        @stack('styles')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand luxury-font d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.svg') }}" alt="Dazzle Jewelry Logo" class="me-2" style="height: 40px;">
                    Dazzle Jewelry
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart') }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('orders') }}">Orders</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="py-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="luxury-font mb-4">Dazzle Jewelry</h5>
                        <p class="text-gray-600">Discover our collection of handcrafted pieces that blend timeless elegance with modern design.</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="luxury-font mb-4">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('shop') }}" class="text-gray-600 hover:text-primary-gold">Shop</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-primary-gold">About</a></li>
                            <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-primary-gold">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 class="luxury-font mb-4">Contact Us</h5>
                        <ul class="list-unstyled">
                            <li class="text-gray-600">Email: info@dazzlejewelry.com</li>
                            <li class="text-gray-600">Phone: +1 (555) 123-4567</li>
                            <li class="text-gray-600">Address: 123 Luxury Street, New York, NY</li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-gray-600">&copy; {{ date('Y') }} Dazzle Jewelry. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Custom JS -->
        @stack('scripts')
    </body>
</html>
