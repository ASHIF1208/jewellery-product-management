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
                align-items: center;
                justify-content: center;
            }

            .auth-container {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 15px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                padding: 2.5rem;
                width: 100%;
                max-width: 500px;
                margin: 1rem;
            }

            .brand-logo {
                font-family: 'Playfair Display', serif;
                font-size: 2rem;
                color: var(--gold);
                text-align: center;
                margin-bottom: 2rem;
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

            .btn-luxury {
                background-color: var(--gold);
                color: var(--light);
                border: none;
                padding: 0.8rem 2rem;
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 1px;
                transition: all 0.3s ease;
                width: 100%;
                border-radius: 8px;
            }

            .btn-luxury:hover {
                background-color: var(--dark-gold);
                color: var(--light);
                transform: translateY(-2px);
                box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            }

            .auth-link {
                text-align: center;
                margin-top: 1.5rem;
                font-size: 0.9rem;
            }

            .auth-link a {
                color: var(--gold);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.3s ease;
            }

            .auth-link a:hover {
                color: var(--dark-gold);
            }

            @media (max-width: 576px) {
                .auth-container {
                    margin: 1rem;
                    padding: 1.5rem;
                }
            }
        </style>
        @stack('styles')
    </head>
    <body>
        <div class="auth-container">
            <div class="brand-logo d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/logo.svg') }}" alt="Dazzle Jewelry Logo" class="me-2" style="height: 40px;">
                Dazzle Jewelry
            </div>
            @yield('content')
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>
</html>
