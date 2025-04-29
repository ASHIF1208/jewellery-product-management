@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Checkout</h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-8">
            @csrf
            
            <!-- Shipping Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Shipping Information</h2>
                <div class="space-y-4">
                    <div>
                        <label for="shipping_address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500"
                            required>{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Billing Information -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Billing Information</h2>
                <div class="space-y-4">
                    <div>
                        <label for="billing_address" class="block text-sm font-medium text-gray-700">Billing Address</label>
                        <textarea name="billing_address" id="billing_address" rows="3" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gold-500 focus:ring-gold-500"
                            required>{{ old('billing_address') }}</textarea>
                        @error('billing_address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Payment Method</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="credit_card" value="credit_card" 
                                class="h-4 w-4 text-gold-600 focus:ring-gold-500 border-gray-300"
                                {{ old('payment_method') == 'credit_card' ? 'checked' : '' }} required>
                            <label for="credit_card" class="ml-2 block text-sm font-medium text-gray-700">
                                Credit Card
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="debit_card" value="debit_card" 
                                class="h-4 w-4 text-gold-600 focus:ring-gold-500 border-gray-300"
                                {{ old('payment_method') == 'debit_card' ? 'checked' : '' }}>
                            <label for="debit_card" class="ml-2 block text-sm font-medium text-gray-700">
                                Debit Card
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" name="payment_method" id="bank_transfer" value="bank_transfer" 
                                class="h-4 w-4 text-gold-600 focus:ring-gold-500 border-gray-300"
                                {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
                            <label for="bank_transfer" class="ml-2 block text-sm font-medium text-gray-700">
                                Bank Transfer
                            </label>
                        </div>
                    </div>
                    @error('payment_method')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Summary</h2>
                <div class="space-y-4">
                    @foreach($items as $item)
                        <div class="flex items-center justify-between py-2">
                            <div class="flex items-center">
                                <img src="{{ $item['product']->image_url }}" alt="{{ $item['product']->name }}" 
                                    class="h-16 w-16 object-cover rounded">
                                <div class="ml-4">
                                    <h3 class="text-sm font-medium text-gray-800">{{ $item['product']->name }}</h3>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                                </div>
                            </div>
                            <p class="text-sm font-medium text-gray-800">
                                ${{ number_format($item['subtotal'], 2) }}
                            </p>
                        </div>
                        <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $item['product']->id }}">
                        <input type="hidden" name="products[{{ $loop->index }}][quantity]" value="{{ $item['quantity'] }}">
                    @endforeach

                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <div class="flex justify-between">
                            <p class="text-base font-medium text-gray-900">Total</p>
                            <p class="text-base font-medium text-gray-900">${{ number_format($total, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                    class="bg-gold-600 text-white px-6 py-3 rounded-md hover:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500">
                    Place Order
                </button>
            </div>
        </form>
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