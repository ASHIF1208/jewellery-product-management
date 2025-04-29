@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="p-5 p-lg-8">
                    <div class="text-center text-lg-start">
                        <h1 class="luxury-font display-4 fw-bold mb-4">
                            <span class="d-block">Exquisite</span>
                            <span class="text-primary-gold d-block">Luxury Jewelry</span>
                        </h1>
                        <p class="lead text-muted mb-5">
                            Discover our collection of handcrafted pieces that blend timeless elegance with modern design.
                        </p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center justify-content-lg-start">
                            <a href="{{ route('shop') }}" class="btn-luxury">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-container h-100">
                    <img src="{{ asset('images/hero/luxury-diamond-ring.jpg') }}" alt="Luxury Diamond Ring" class="w-100 h-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Categories -->
    <div class="bg-light py-8">
        <div class="container">
            <div class="text-center mb-8">
                <h2 class="luxury-font display-5 fw-bold mb-3">
                    Featured Categories
                </h2>
                <p class="lead text-muted">
                    Explore our most popular collections
                </p>
            </div>

            <div class="row g-4">
                <!-- Rings -->
                <div class="col-md-4">
                    <div class="card-luxury">
                        <div class="image-container">
                            <img src="{{ asset('images/categories/diamond-rings.jpg') }}" alt="Diamond Rings">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-40 d-flex align-items-center justify-content-center">
                                <h3 class="luxury-font text-2xl fw-bold text-white">Rings</h3>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-muted small">Discover our collection of exquisite rings, from classic solitaires to modern designs.</p>
                            <a href="{{ route('shop', ['category' => 'rings']) }}" class="text-primary-gold text-decoration-none small">View Collection →</a>
                        </div>
                    </div>
                </div>

                <!-- Necklaces -->
                <div class="col-md-4">
                    <div class="card-luxury">
                        <div class="image-container">
                            <img src="{{ asset('images/categories/luxury-necklaces.jpg') }}" alt="Luxury Necklaces">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-40 d-flex align-items-center justify-content-center">
                                <h3 class="luxury-font text-2xl fw-bold text-white">Necklaces</h3>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-muted small">Explore our stunning necklaces, perfect for any occasion.</p>
                            <a href="{{ route('shop', ['category' => 'necklaces']) }}" class="text-primary-gold text-decoration-none small">View Collection →</a>
                        </div>
                    </div>
                </div>

                <!-- Earrings -->
                <div class="col-md-4">
                    <div class="card-luxury">
                        <div class="image-container">
                            <img src="{{ asset('images/categories/elegant-earrings.jpg') }}" alt="Elegant Earrings">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-40 d-flex align-items-center justify-content-center">
                                <h3 class="luxury-font text-2xl fw-bold text-white">Earrings</h3>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-muted small">Browse our selection of elegant earrings, from studs to statement pieces.</p>
                            <a href="{{ route('shop', ['category' => 'earrings']) }}" class="text-primary-gold text-decoration-none small">View Collection →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="py-8">
        <div class="container">
            <div class="text-center mb-8">
                <h2 class="luxury-font display-5 fw-bold mb-3">
                    Featured Products
                </h2>
                <p class="lead text-muted">
                    Our most popular pieces
                </p>
            </div>

            <div class="row g-4">
                @foreach($featuredProducts as $product)
                <div class="col-sm-6 col-lg-3">
                    <div class="card-luxury">
                        <div class="image-container">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            <div class="position-absolute top-3 end-3">
                                <button class="btn btn-light btn-sm rounded-circle shadow-sm">
                                    <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="luxury-font h5 fw-semibold mb-2">
                                <a href="{{ route('products.show', $product) }}" class="text-dark text-decoration-none hover:text-primary-gold">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 fw-bold text-primary-gold mb-0">${{ number_format($product->price, 2) }}</span>
                                <a href="{{ route('products.show', $product) }}" class="btn-luxury btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="bg-light py-8">
        <div class="container">
            <div class="text-center mb-8">
                <h2 class="luxury-font display-5 fw-bold mb-3">
                    Why Choose Us
                </h2>
                <p class="lead text-muted">
                    Experience the difference of luxury craftsmanship
                </p>
            </div>

            <div class="row g-4">
                <!-- Quality -->
                <div class="col-md-4">
                    <div class="card-luxury p-4">
                        <div class="text-primary-gold mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="h5 fw-semibold mb-2">Premium Quality</h3>
                        <p class="text-muted small">We use only the finest materials and gemstones in our jewelry.</p>
                    </div>
                </div>

                <!-- Craftsmanship -->
                <div class="col-md-4">
                    <div class="card-luxury p-4">
                        <div class="text-primary-gold mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="h5 fw-semibold mb-2">Expert Craftsmanship</h3>
                        <p class="text-muted small">Each piece is handcrafted by skilled artisans with years of experience.</p>
                    </div>
                </div>

                <!-- Service -->
                <div class="col-md-4">
                    <div class="card-luxury p-4">
                        <div class="text-primary-gold mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <h3 class="h5 fw-semibold mb-2">Exceptional Service</h3>
                        <p class="text-muted small">We provide personalized service and attention to every detail.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 