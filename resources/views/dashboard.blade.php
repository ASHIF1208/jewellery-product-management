<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Recent Orders -->
                        <div class="card-luxury p-6">
                            <h3 class="luxury-font text-xl font-semibold mb-4">Recent Orders</h3>
                            <div class="space-y-4">
                                @forelse($recentOrders ?? [] as $order)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="font-medium">{{ $order->order_number }}</p>
                                            <p class="text-sm text-gray-600">{{ $order->created_at->format('M d, Y') }}</p>
                                        </div>
                                        <span class="text-primary-gold font-semibold">${{ number_format($order->total, 2) }}</span>
                                    </div>
                                @empty
                                    <p class="text-gray-600">No recent orders</p>
                                @endforelse
                            </div>
                            <a href="{{ route('orders') }}" class="mt-4 inline-block text-primary-gold hover:text-secondary-gold">View All Orders →</a>
                        </div>

                        <!-- Wishlist -->
                        <div class="card-luxury p-6">
                            <h3 class="luxury-font text-xl font-semibold mb-4">Wishlist</h3>
                            <div class="space-y-4">
                                @forelse($wishlistItems ?? [] as $item)
                                    <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg">
                                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="w-12 h-12 object-cover rounded-lg">
                                        <div class="flex-1">
                                            <p class="font-medium text-sm">{{ $item->name }}</p>
                                            <p class="text-sm text-gray-600">${{ number_format($item->price, 2) }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-600">Your wishlist is empty</p>
                                @endforelse
                            </div>
                            <a href="{{ route('shop') }}" class="mt-4 inline-block text-primary-gold hover:text-secondary-gold">Continue Shopping →</a>
                        </div>

                        <!-- Quick Actions -->
                        <div class="card-luxury p-6">
                            <h3 class="luxury-font text-xl font-semibold mb-4">Quick Actions</h3>
                            <div class="space-y-3">
                                <a href="{{ route('profile.edit') }}" class="block p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 text-primary-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span class="text-sm">Edit Profile</span>
                                    </div>
                                </a>
                                <a href="{{ route('cart') }}" class="block p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 text-primary-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span class="text-sm">View Cart</span>
                                    </div>
                                </a>
                                <a href="{{ route('orders') }}" class="block p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                                    <div class="flex items-center space-x-3">
                                        <svg class="w-5 h-5 text-primary-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <span class="text-sm">View Orders</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
