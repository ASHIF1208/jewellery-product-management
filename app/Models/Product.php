<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'category_id',
        'stock'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer'
    ];

    public function setImageAttribute($value)
    {
        if ($value) {
            // Generate unique filename
            $filename = time() . '_' . uniqid() . '.' . $value->getClientOriginalExtension();
            
            // Create image instance and process it
            $image = Image::read($value)
                ->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            
            // Save to storage with configured quality
            Storage::put(
                'public/products/' . $filename, 
                $image->toJpeg((int) config('image.quality', 90))->toString()
            );
            
            // Set the image path
            $this->attributes['image'] = 'products/' . $filename;
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->attributes['image_url']) {
            $path = $this->attributes['image_url'];
            
            // If the path starts with /images/, it's a public path
            if (str_starts_with($path, '/images/')) {
                // Try different variations of the image name
                $basePath = str_replace('.jpg', '', $path);
                $variations = [
                    $basePath . '-1.jpg',
                    $basePath . '-2.jpg',
                    $path // original path
                ];
                
                foreach ($variations as $variation) {
                    if (file_exists(public_path($variation))) {
                        return asset($variation);
                    }
                }
            }
            
            // Otherwise, it's a storage path
            $storagePath = storage_path('app/public/' . $path);
            if (file_exists($storagePath)) {
                return asset('storage/' . $path);
            }
        }
        return null;
    }

    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
