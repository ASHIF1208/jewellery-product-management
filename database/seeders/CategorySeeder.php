<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Rings',
                'description' => 'Beautiful collection of engagement rings, wedding bands, and fashion rings',
                'image_url' => '/images/categories/rings.jpg'
            ],
            [
                'name' => 'Necklaces',
                'description' => 'Elegant necklaces and pendants for every occasion',
                'image_url' => '/images/categories/necklaces.jpg'
            ],
            [
                'name' => 'Earrings',
                'description' => 'Stunning earrings from studs to chandeliers',
                'image_url' => '/images/categories/earrings.jpg'
            ],
            [
                'name' => 'Bracelets',
                'description' => 'Luxurious bracelets and bangles',
                'image_url' => '/images/categories/bracelets.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'image_url' => $category['image_url']
            ]);
        }
    }
}
