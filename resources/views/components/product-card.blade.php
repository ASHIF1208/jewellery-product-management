@props(['product'])

<div class="card-luxury">
    <div class="card-image">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
        
        @if($product->stock <= 0)
            <div class="out-of-stock">
                <span>Out of Stock</span>
            </div>
        @endif
    </div>
    
    <div class="card-content">
        <h3 class="luxury-font">{{ $product->name }}</h3>
        <p class="description">{{ Str::limit($product->description, 100) }}</p>
        
        <div class="card-footer">
            <p class="price text-primary">${{ number_format($product->price, 2) }}</p>
            
            @if($product->stock > 0)
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <x-button type="submit" variant="primary" size="sm">
                        Add to Cart
                    </x-button>
                </form>
            @endif
        </div>
    </div>
</div> 