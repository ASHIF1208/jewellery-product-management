@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
            <!-- Product Images -->
            <div class="lg:max-w-lg lg:self-end">
                <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                        class="w-full h-full object-center object-cover">
                </div>
                <div class="mt-4 grid grid-cols-4 gap-4">
                    @foreach($product->images as $image)
                        <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                            <img src="{{ $image->image_url }}" alt="{{ $product->name }}" 
                                class="w-full h-full object-center object-cover">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Product Info -->
            <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $product->name }}</h1>
                    <a href="{{ route('shop') }}" class="text-gold-600 hover:text-gold-700">
                        ← Back to Shop
                    </a>
                </div>
                
                <div class="mt-3">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl text-gray-900">${{ number_format($product->price, 2) }}</p>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Description</h3>
                    <div class="text-base text-gray-700 space-y-6">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex items-center">
                        <h3 class="text-sm text-gray-600">Category:</h3>
                        <p class="ml-2 text-sm text-gray-900">{{ $product->category->name }}</p>
                    </div>
                    <div class="flex items-center mt-2">
                        <h3 class="text-sm text-gray-600">Stock:</h3>
                        <p class="ml-2 text-sm text-gray-900">{{ $product->stock }} available</p>
                    </div>
                </div>

                @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-8">
                        @csrf
                        <div class="flex items-center">
                            <label for="quantity" class="mr-4 text-sm font-medium text-gray-700">Quantity</label>
                            <select name="quantity" id="quantity" 
                                class="rounded-md border-gray-300 py-1.5 text-base leading-5 focus:border-gold-500 focus:ring-gold-500">
                                @for($i = 1; $i <= min($product->stock, 10); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mt-8 grid grid-cols-1 gap-4">
                            <button type="submit" 
                                class="w-full bg-gold-600 text-white px-6 py-3 rounded-md hover:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to Cart
                            </button>

                            <a href="{{ route('checkout') }}" 
                                class="w-full bg-white text-gold-600 border border-gold-600 px-6 py-3 rounded-md hover:bg-gold-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Buy Now
                            </a>

                            <form action="{{ route('wishlist.add', $product) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" 
                                    class="w-full bg-white text-gold-600 border border-gold-600 px-6 py-3 rounded-md hover:bg-gold-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    Add to Wishlist
                                </button>
                            </form>
                        </div>
                    </form>
                @else
                    <div class="mt-8">
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Out of Stock</h3>
                                    <p class="mt-1 text-sm text-red-700">This product is currently unavailable.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(auth()->user() && auth()->user()->isAdmin())
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('admin.products.edit', $product) }}" 
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-gold-500 focus:ring focus:ring-gold-500 focus:ring-opacity-50 active:bg-gray-50 disabled:opacity-25 transition">
                            Edit Product
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-red-600 hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-700 focus:ring-opacity-50 active:bg-red-700 disabled:opacity-25 transition">
                                Delete Product
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gold-600 {
        background-color: #B8860B;
    }
    .hover\:bg-gold-700:hover {
        background-color: #996D09;
    }
    .focus\:ring-gold-500:focus {
        --tw-ring-color: #DAA520;
    }
    .text-gold-600 {
        color: #B8860B;
    }
    .focus\:border-gold-500:focus {
        border-color: #DAA520;
    }
    .hover\:bg-gold-50:hover {
        background-color: #FFF8DC;
    }
</style>
@endsection 