<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('images')->latest()->paginate(12);
        
        // Debug information
        foreach ($products as $product) {
            \Log::info('Product: ' . $product->name);
            \Log::info('Raw image_url from DB: ' . $product->getRawOriginal('image_url'));
            \Log::info('Final image URL: ' . $product->image_url);
        }
        
        return view('shop.index', compact('products'));
    }

    public function getProducts()
    {
        try {
            $products = Product::with('category')->select(['id', 'name', 'description', 'price', 'category_id', 'image']);
            
            return DataTables::of($products)
                ->addColumn('image', function ($product) {
                    return $product->image_url ? 
                        '<img src="' . $product->image_url . '" alt="' . $product->name . '" class="img-thumbnail" width="50">' :
                        'No Image';
                })
                ->addColumn('category', function ($product) {
                    return $product->category ? $product->category->name : 'Uncategorized';
                })
                ->addColumn('formatted_price', function ($product) {
                    return $product->formatted_price;
                })
                ->addColumn('action', function ($product) {
                    return '
                        <div class="btn-group" role="group">
                            <a href="' . route('products.edit', $product->id) . '" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button onclick="deleteProduct(' . $product->id . ')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>
                    ';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            \Log::error('DataTables Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $validated['image_url'] = 'products/' . $imageName;
        }

        $product = Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Eager load any relationships if needed
        $product->load(['category', 'images']);
        
        return view('shop.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = \App\Models\Category::all();
        return view('products.form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_url) {
                Storage::delete('public/' . $product->image_url);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $validated['image_url'] = 'products/' . $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('shop')
            ->with('success', 'Product deleted successfully!');
    }
}
