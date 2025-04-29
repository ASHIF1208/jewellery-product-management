@extends('layouts.app')

@section('title', 'Shop')

@section('content')
    <div class="container py-8">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-8">
            <h1 class="luxury-font display-5 fw-bold">
                Shop
            </h1>
            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('admin.products.create') }}" class="btn-luxury">
                    Add New Product
                </a>
            @endif
        </div>

        <!-- Filters -->
        <div class="card-luxury p-4 mb-8">
            <form action="{{ route('shop') }}" method="GET" class="row g-4">
                <div class="col-md-4">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="">All Categories</option>
                        <option value="rings" {{ request('category') === 'rings' ? 'selected' : '' }}>Rings</option>
                        <option value="necklaces" {{ request('category') === 'necklaces' ? 'selected' : '' }}>Necklaces</option>
                        <option value="earrings" {{ request('category') === 'earrings' ? 'selected' : '' }}>Earrings</option>
                        <option value="bracelets" {{ request('category') === 'bracelets' ? 'selected' : '' }}>Bracelets</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="sort" class="form-label">Sort By</label>
                    <select name="sort" id="sort" class="form-control">
                        <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn-luxury w-100">
                        Apply Filters
                    </button>
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="row g-4 pt-4">
            @forelse($products as $product)
                <div class="col-sm-6 col-lg-3">
                    <div class="card-luxury h-100 d-flex flex-column">
                        <div class="image-container" style="height: 250px;">
                            <a href="{{ route('products.show', $product) }}" class="d-block position-relative h-100">
                                @if($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                        <span class="text-muted">No Image Available</span>
                                    </div>
                                @endif
                                @if($product->stock <= 0)
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                                        <span class="text-white fw-semibold">Out of Stock</span>
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h3 class="luxury-font h5 fw-semibold mb-2">
                                <a href="{{ route('products.show', $product) }}" class="text-dark text-decoration-none hover:text-primary-gold">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="text-muted small mb-3" style="height: 40px; overflow: hidden;">{{ Str::limit($product->description, 100) }}</p>
                            <div class="justify-content-between align-items-center mt-auto">
                                <span class="h5 fw-bold text-primary-gold mb-0 d-flex">${{ number_format($product->price, 2) }}</span>
                                @if($product->stock > 0)
                                    <form action="{{ route('cart.add', $product) }}" method="POST" class="mb-0 mt-3">
                                        @csrf
                                        <button type="submit" class="btn-luxury btn-sm">
                                            Add to Cart
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-8">
                    <svg class="mx-auto mb-4" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <h3 class="h5 fw-semibold mb-2">No products found</h3>
                    <p class="text-muted">Try adjusting your search or filter to find what you're looking for.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
@endsection 