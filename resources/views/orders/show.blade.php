@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
    <div class="container py-8">
        <div class="card-luxury">
            <div class="p-6">
                <div class="d-flex justify-content-between align-items-center mb-8">
                    <h1 class="luxury-font display-5 fw-bold text-primary-gold mb-0">Order #{{ $order->order_number }}</h1>
                    <a href="{{ route('orders') }}" class="btn btn-outline-primary">
                        ← Back to Orders
                    </a>
                </div>

                <!-- Order Status -->
                <div class="card-luxury mb-8">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="h5 fw-semibold mb-1">Order Status</h3>
                                <p class="text-muted small mb-0">Placed on {{ $order->created_at->format('F d, Y') }}</p>
                            </div>
                            <div class="d-flex gap-3">
                                <span class="badge 
                                    @if($order->status === 'completed') bg-success
                                    @elseif($order->status === 'pending') bg-warning
                                    @else bg-secondary
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <span class="badge 
                                    @if($order->payment_status === 'paid') bg-success
                                    @elseif($order->payment_status === 'pending') bg-warning
                                    @else bg-secondary
                                    @endif">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="card-luxury mb-8">
                    <div class="p-4">
                        <h3 class="h5 fw-semibold mb-4">Order Items</h3>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-muted small text-uppercase">Product</th>
                                        <th class="text-muted small text-uppercase">Price</th>
                                        <th class="text-muted small text-uppercase">Quantity</th>
                                        <th class="text-muted small text-uppercase">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <img class="rounded" src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" width="48" height="48">
                                                    </div>
                                                    <div>
                                                        <div class="fw-semibold">{{ $item->product->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>${{ number_format($item->price, 2) }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>${{ number_format($item->subtotal, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end fw-semibold">Total</td>
                                        <td class="fw-semibold">{{ $order->formatted_total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Shipping & Billing Information -->
                <div class="row g-4">
                    <!-- Shipping Address -->
                    <div class="col-md-6">
                        <div class="card-luxury h-100">
                            <div class="p-4">
                                <h3 class="h5 fw-semibold mb-4">Shipping Address</h3>
                                <p class="text-muted mb-0">{{ $order->shipping_address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Billing Address -->
                    <div class="col-md-6">
                        <div class="card-luxury h-100">
                            <div class="p-4">
                                <h3 class="h5 fw-semibold mb-4">Billing Address</h3>
                                <p class="text-muted mb-0">{{ $order->billing_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 