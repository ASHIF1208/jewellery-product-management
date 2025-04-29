@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Shopping Cart</h1>

        @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 rounded-md p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 rounded-md p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(count($items) > 0)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Cart Items -->
                <div class="divide-y divide-gray-200">
                    @foreach($items as $item)
                        <div class="p-6 flex items-center">
                            <div class="flex-shrink-0 w-24 h-24">
                                <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" 
                                    class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="ml-6 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">{{ $item->product->name }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->product->description }}</p>
                                    </div>
                                    <p class="text-lg font-medium text-gray-900">${{ number_format($item->product->price, 2) }}</p>
                                </div>
                                <div class="mt-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <form action="{{ route('cart.update', $item->product) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <label for="quantity" class="sr-only">Quantity</label>
                                            <select name="quantity" id="quantity" 
                                                class="rounded-md border-gray-300 py-1.5 text-base leading-5 focus:border-gold-500 focus:ring-gold-500"
                                                onchange="this.form.submit()">
                                                @for($i = 1; $i <= min($item->product->stock, 10); $i++)
                                                    <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </form>
                                        <form action="{{ route('cart.remove', $item->product) }}" method="POST" class="ml-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                    <p class="text-lg font-medium text-gray-900">
                                        ${{ number_format($item->product->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Cart Summary -->
                <div class="bg-gray-50 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Total</p>
                            <p class="text-sm text-gray-500">Shipping and taxes calculated at checkout</p>
                        </div>
                        <p class="text-2xl font-semibold text-gray-900">${{ number_format($total, 2) }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('checkout') }}" 
                            class="w-full bg-gold-600 text-white px-6 py-3 rounded-md hover:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 text-center block">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Your cart is empty</h3>
                <p class="mt-1 text-sm text-gray-500">Start adding some items to your cart!</p>
                <div class="mt-6">
                    <a href="{{ route('shop') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gold-600 hover:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500">
                        Continue Shopping
                    </a>
                </div>
            </div>
        @endif
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
</style>
@endsection 