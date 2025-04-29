<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            // Create primary image
            if ($product->image_url) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $product->image_url,
                    'is_primary' => true,
                    'sort_order' => 0
                ]);

                // Create additional images for each product
                $baseImageName = strtolower(str_replace(' ', '-', $product->name));
                $additionalImages = [
                    [
                        'image_url' => "/images/products/{$baseImageName}-angle1.jpg",
                        'sort_order' => 1
                    ],
                    [
                        'image_url' => "/images/products/{$baseImageName}-angle2.jpg",
                        'sort_order' => 2
                    ],
                    [
                        'image_url' => "/images/products/{$baseImageName}-detail.jpg",
                        'sort_order' => 3
                    ]
                ];

                foreach ($additionalImages as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => $image['image_url'],
                        'is_primary' => false,
                        'sort_order' => $image['sort_order']
                    ]);
                }
            }
        }
    }
}
