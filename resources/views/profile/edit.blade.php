@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container py-8">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-6">
                    <h1 class="luxury-font display-4 fw-bold text-primary-gold">Profile Settings</h1>
                    <p class="text-muted">Manage your account settings and preferences</p>
                </div>

                <div class="card-luxury mb-4">
                    <div class="p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-primary-gold me-3">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 class="h5 fw-semibold mb-0">Personal Information</h2>
                        </div>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="card-luxury mb-4">
                    <div class="p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-primary-gold me-3">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                            <h2 class="h5 fw-semibold mb-0">Security Settings</h2>
                        </div>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="card-luxury">
                    <div class="p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-danger me-3">
                                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </div>
                            <h2 class="h5 fw-semibold mb-0">Danger Zone</h2>
                        </div>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
