<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wishlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($wishlistItems->isEmpty())
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Your wishlist is empty</h3>
                            <p class="mt-1 text-sm text-gray-500">Start adding some items to your wishlist.</p>
                            <div class="mt-6">
                                <a href="{{ route('shop') }}" class="inline-flex items-center px-4 py-2 bg-primary-gold border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-secondary-gold focus:bg-secondary-gold active:bg-secondary-gold focus:outline-none focus:ring-2 focus:ring-primary-gold focus:ring-offset-2 transition ease-in-out duration-150">
                                    Browse Products
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($wishlistItems as $item)
                                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                                    <a href="{{ route('products.show', $item->product) }}" class="block relative">
                                        <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-full h-64 object-cover group-hover:opacity-75 transition-opacity duration-300">
                                        @if($item->product->stock <= 0)
                                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                                <span class="text-white font-semibold">Out of Stock</span>
                                            </div>
                                        @endif
                                    </a>
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                            <a href="{{ route('products.show', $item->product) }}" class="hover:text-primary-gold">
                                                {{ $item->product->name }}
                                            </a>
                                        </h3>
                                        <p class="text-sm text-gray-500 mb-4">{{ Str::limit($item->product->description, 100) }}</p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-lg font-bold text-primary-gold">${{ number_format($item->product->price, 2) }}</span>
                                            <div class="flex space-x-2">
                                                @if($item->product->stock > 0)
                                                    <form action="{{ route('cart.add', $item->product) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-primary-gold hover:bg-secondary-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-gold">
                                                            Add to Cart
                                                        </button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('wishlist.remove', $item->product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-gold">
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 