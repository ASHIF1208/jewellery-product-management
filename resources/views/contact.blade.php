@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container py-8">
        <div class="card-luxury">
            <div class="p-6">
                <div class="max-w-3xl mx-auto">
                    <h1 class="luxury-font display-5 fw-bold text-primary-gold mb-8">Get in Touch</h1>
                    
                    <div class="row g-4">
                        <!-- Contact Information -->
                        <div class="col-md-6">
                            <h2 class="h3 fw-semibold text-dark mb-4">Contact Information</h2>
                            <div class="d-flex flex-column gap-4">
                                <div class="d-flex">
                                    <div class="text-primary-gold me-3">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="h5 fw-semibold mb-1">Visit Us</h3>
                                        <p class="text-muted mb-0">123 Luxury Lane<br>Jewelry District<br>New York, NY 10001</p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="text-primary-gold me-3">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="h5 fw-semibold mb-1">Call Us</h3>
                                        <p class="text-muted mb-0">+1 (555) 123-4567</p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="text-primary-gold me-3">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="h5 fw-semibold mb-1">Email Us</h3>
                                        <p class="text-muted mb-0">info@luxuryjewelry.com</p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="text-primary-gold me-3">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="h5 fw-semibold mb-1">Business Hours</h3>
                                        <p class="text-muted mb-0">Monday - Friday: 10:00 AM - 7:00 PM<br>Saturday: 11:00 AM - 6:00 PM<br>Sunday: Closed</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Form -->
                        <div class="col-md-6">
                            <h2 class="h3 fw-semibold text-dark mb-4">Send Us a Message</h2>
                            @if(session('success'))
                                <div class="alert alert-success mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('contact.store') }}" method="POST" class="d-flex flex-column gap-4">
                                @csrf
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>

                                <div>
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control" required>
                                </div>

                                <div>
                                    <label for="message" class="form-label">Message</label>
                                    <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
                                </div>

                                <div>
                                    <button type="submit" class="btn-luxury w-100">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 