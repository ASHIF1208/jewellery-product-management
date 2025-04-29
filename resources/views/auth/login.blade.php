<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Luxury Jewelry') }} - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-gold: #D4AF37;
            --secondary-gold: #B8860B;
            --dark-bg: #1a1a1a;
            --light-bg: #ffffff;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .luxury-font {
            font-family: 'Playfair Display', serif;
        }

        .btn-luxury {
            background-color: var(--primary-gold);
            color: var(--light-bg);
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            display: inline-block;
        }

        .btn-luxury:hover {
            background-color: var(--secondary-gold);
            transform: translateY(-2px);
        }

        .form-input {
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            width: 100%;
        }

        .form-input:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1);
            outline: none;
        }

        .login-container {
            background-image: url('{{ asset('images/hero/luxury-diamond-ring.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .login-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center login-container">
        <div class="max-w-md w-full mx-4">
            <div class="login-form p-8">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <a href="{{ route('home') }}" class="luxury-font text-3xl font-bold text-gray-800">
                        Luxury Jewelry
                    </a>
                </div>

                <x-form-card title="Login" action="{{ route('login') }}">
                    <x-form-input
                        label="Email Address"
                        name="email"
                        type="email"
                        required
                        placeholder="Enter your email address"
                        value="{{ old('email') }}"
                    />

                    <x-form-input
                        label="Password"
                        name="password"
                        type="password"
                        required
                        placeholder="Enter your password"
                    />

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-end mb-3">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                Forgot Your Password?
                            </a>
                        </div>
                    @endif
                </x-form-card>

                <!-- Register Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-primary-gold hover:text-secondary-gold">
                            Register now
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
