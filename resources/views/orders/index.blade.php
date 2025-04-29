@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <div class="container py-8">
        <div class="card-luxury">
            <div class="p-6">
                <h1 class="luxury-font display-5 fw-bold text-primary-gold mb-8">My Orders</h1>

                @if($orders->isEmpty())
                    <div class="text-center py-8">
                        <svg class="mx-auto mb-4" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <h3 class="h5 fw-semibold mb-2">No orders found</h3>
                        <p class="text-muted mb-4">Get started by placing your first order.</p>
                        <a href="{{ route('shop') }}" class="btn-luxury">
                            Start Shopping
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-muted small text-uppercase">Order Number</th>
                                    <th class="text-muted small text-uppercase">Date</th>
                                    <th class="text-muted small text-uppercase">Total</th>
                                    <th class="text-muted small text-uppercase">Status</th>
                                    <th class="text-muted small text-uppercase">Payment Status</th>
                                    <th class="text-muted small text-uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="fw-semibold">{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                        <td>{{ $order->formatted_total }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($order->status === 'completed') bg-success
                                                @elseif($order->status === 'pending') bg-warning
                                                @else bg-secondary
                                                @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge 
                                                @if($order->payment_status === 'paid') bg-success
                                                @elseif($order->payment_status === 'pending') bg-warning
                                                @else bg-secondary
                                                @endif">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection 