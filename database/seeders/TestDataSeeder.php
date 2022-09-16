<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        Category::query()->each(static function (Category $category) {
            Image::factory()->count(1)->for($category, 'model')->create();

            $products = Product::factory()->count(rand(3, 10))->hasImages(3)->create();

            foreach ($products as $product) {
//                (new ProductRepository)->attachCategories($product, [$category]);
                $product->categories()->attach($category);
            }
        });
    }
}
