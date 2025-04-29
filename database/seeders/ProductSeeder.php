<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Diamond Engagement Ring',
                'description' => 'A stunning diamond engagement ring featuring a brilliant cut center stone surrounded by smaller diamonds.',
                'price' => 2999.99,
                'image_url' => '/images/products/diamond-ring.jpg',
                'category_id' => Category::where('name', 'Rings')->first()->id,
                'stock' => 5
            ],
            [
                'name' => 'Gold Necklace',
                'description' => 'Elegant 18k gold necklace with a delicate chain and pendant.',
                'price' => 899.99,
                'image_url' => '/images/products/gold-necklace.jpg',
                'category_id' => Category::where('name', 'Necklaces')->first()->id,
                'stock' => 10
            ],
            [
                'name' => 'Pearl Earrings',
                'description' => 'Classic pearl earrings with a modern twist, perfect for any occasion.',
                'price' => 299.99,
                'image_url' => '/images/products/pearl-earrings.jpg',
                'category_id' => Category::where('name', 'Earrings')->first()->id,
                'stock' => 15
            ],
            [
                'name' => 'Sapphire Bracelet',
                'description' => 'Beautiful sapphire bracelet with alternating blue sapphires and diamonds.',
                'price' => 1499.99,
                'image_url' => '/images/products/sapphire-bracelet.jpg',
                'category_id' => Category::where('name', 'Bracelets')->first()->id,
                'stock' => 8
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 