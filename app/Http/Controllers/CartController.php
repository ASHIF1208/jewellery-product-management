<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        $items = [];

        foreach ($cart as $id => $quantity) {
            $product = Product::find($id);
            if ($product) {
                $items[] = (object)[
                    'product' => $product,
                    'quantity' => $quantity
                ];
                $total += $product->price * $quantity;
            }
        }

        return view('cart.index', compact('items', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        
        // Validate quantity
        if ($quantity < 1 || $quantity > $product->stock) {
            return redirect()->back()->with('error', 'Invalid quantity selected.');
        }

        $cart = Session::get('cart', []);
        
        if (isset($cart[$product->id])) {
            $newQuantity = $cart[$product->id] + $quantity;
            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
            $cart[$product->id] = $newQuantity;
        } else {
            $cart[$product->id] = $quantity;
        }

        Session::put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock
        ]);

        $cart = Session::get('cart', []);
        $cart[$product->id] = $request->quantity;
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
} 