@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="container py-8">
        <div class="card-luxury">
            <div class="p-6">
                <div class="max-w-3xl mx-auto">
                    <h1 class="luxury-font display-5 fw-bold text-primary-gold mb-8">Our Story</h1>
                    
                    <div class="prose prose-lg">
                        <p class="mb-6">
                            Welcome to our exquisite jewelry collection, where timeless elegance meets contemporary design. 
                            We are passionate about creating and curating pieces that tell your unique story.
                        </p>

                        <h2 class="h3 fw-semibold text-dark mt-8 mb-4">Our Heritage</h2>
                        <p class="mb-6">
                            With decades of experience in the jewelry industry, we have built our reputation on quality, 
                            craftsmanship, and exceptional customer service. Each piece in our collection is carefully 
                            selected to ensure it meets our high standards of excellence.
                        </p>

                        <h2 class="h3 fw-semibold text-dark mt-8 mb-4">Our Commitment</h2>
                        <p class="mb-6">
                            We are committed to providing you with:
                        </p>
                        <ul class="list-unstyled mb-6">
                            <li class="mb-2 d-flex align-items-center">
                                <svg class="text-primary-gold me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Premium quality materials and craftsmanship
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <svg class="text-primary-gold me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Ethically sourced gemstones and metals
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <svg class="text-primary-gold me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Personalized customer service
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <svg class="text-primary-gold me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Lifetime warranty on all our pieces
                            </li>
                            <li class="mb-2 d-flex align-items-center">
                                <svg class="text-primary-gold me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Expert jewelry care and maintenance advice
                            </li>
                        </ul>

                        <h2 class="h3 fw-semibold text-dark mt-8 mb-4">Our Collection</h2>
                        <p class="mb-6">
                            From classic diamond rings to modern statement pieces, our collection offers something for 
                            every occasion and style. We work with renowned designers and artisans to bring you the 
                            finest jewelry that combines traditional craftsmanship with contemporary design.
                        </p>

                        <div class="text-center mt-8">
                            <a href="{{ route('shop') }}" class="btn-luxury">
                                Explore Our Collection
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 