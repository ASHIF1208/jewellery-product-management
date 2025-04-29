<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get recent orders
        $recentOrders = Order::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();
        
        // Get wishlist items
        $wishlistItems = Wishlist::where('user_id', $user->id)
            ->with('product')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return (object)[
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'image_url' => $item->product->image_url
                ];
            });
        
        return view('dashboard', compact('recentOrders', 'wishlistItems'));
    }
} 