<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Shoe;
use App\Models\ShoePhoto;
use App\Models\ShoeSize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShoeSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Categories
        $categoriesData = [
            ['name' => 'Lifestyle', 'icon' => 'assets/images/icons/lifestyle.svg'],
            ['name' => 'Running', 'icon' => 'assets/images/icons/running.svg'],
            ['name' => 'Gym', 'icon' => 'assets/images/icons/gym.svg'],
            ['name' => 'Basketball', 'icon' => 'assets/images/icons/basketball.svg'],
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[] = Category::create([
                'name' => $c['name'],
                'icon' => $c['icon'],
            ]);
        }

        // 2. Brands
        $brandsData = [
            ['name' => 'Nike', 'logo' => 'assets/images/logos/nike.svg'],
            ['name' => 'Adidas', 'logo' => 'assets/images/logos/adidas.svg'],
            ['name' => 'Jordan', 'logo' => 'assets/images/logos/jordan.svg'],
            ['name' => 'Puma', 'logo' => 'assets/images/logos/puma.svg'],
        ];

        $brands = [];
        foreach ($brandsData as $b) {
            $brands[] = Brand::create([
                'name' => $b['name'],
                'logo' => $b['logo'],
            ]);
        }

        // 3. 8 Shoes
        $shoesData = [
            [
                'name' => 'Nike Air Humara Shoes',
                'thumbnail' => 'assets/images/thumbnails/Nike Air Humara Shoes (2).png',
                'description' => 'Lifestyle Shoes',
                'about' => 'Experience ultimate comfort with Nike Air Humara Shoes. Features Air cushioning for impact protection, breathable mesh upper, and durable rubber outsole for long-lasting use.',
                'price' => 2456000,
                'stock' => 50,
                'category_id' => $categories[0]->id,
                'brand_id' => $brands[0]->id,
                'is_popular' => true,
                'photos' => [
                    'assets/images/thumbnails/Nike Air Humara Shoes (2).png',
                    'assets/images/thumbnails/photo5.png',
                ],
                'sizes' => [38, 39, 40, 41, 42],
            ],
            [
                'name' => 'Adidas Volcano X',
                'thumbnail' => 'assets/images/thumbnails/photo2.png',
                'description' => 'Running Shoes',
                'about' => 'Designed for street runners, Adidas Volcano X delivers exceptional grip and cushioning. EVA midsole provides responsive energy return with every step.',
                'price' => 980000,
                'stock' => 30,
                'category_id' => $categories[1]->id,
                'brand_id' => $brands[1]->id,
                'is_popular' => true,
                'photos' => [
                    'assets/images/thumbnails/photo2.png',
                ],
                'sizes' => [39, 40, 41, 42, 43],
            ],
            [
                'name' => 'Jordan Sky Star',
                'thumbnail' => 'assets/images/thumbnails/photo5.png',
                'description' => 'Basketball Shoes',
                'about' => 'Honoring basketball legacy, Jordan Sky Star combines retro design with modern comfort. High-top construction for ankle support and rubber outsole for court traction.',
                'price' => 1850000,
                'stock' => 25,
                'category_id' => $categories[3]->id,
                'brand_id' => $brands[2]->id,
                'is_popular' => true,
                'photos' => [
                    'assets/images/thumbnails/photo5.png',
                ],
                'sizes' => [40, 41, 42, 43, 44, 45],
            ],
            [
                'name' => 'Puma Speedster Pro',
                'thumbnail' => 'assets/images/thumbnails/photo6.png',
                'description' => 'Gym & Training',
                'about' => 'Engineered for speed, Puma Speedster Pro features lightweight mesh upper and razor-sharp grip for gym domination.',
                'price' => 3200000,
                'stock' => 20,
                'category_id' => $categories[2]->id,
                'brand_id' => $brands[3]->id,
                'is_popular' => false,
                'photos' => [
                    'assets/images/thumbnails/photo6.png',
                ],
                'sizes' => [38, 39, 40, 41, 42],
            ],
            [
                'name' => 'Nike Air Force 1 Low',
                'thumbnail' => 'assets/images/thumbnails/photo3.png',
                'description' => 'Lifestyle Shoes',
                'about' => 'The icon that started it all. Nike Air Force 1 Low features full-grain leather upper, visible Air sole unit, and bold styling that defined street fashion.',
                'price' => 2800000,
                'stock' => 45,
                'category_id' => $categories[0]->id,
                'brand_id' => $brands[0]->id,
                'is_popular' => true,
                'photos' => [
                    'assets/images/thumbnails/photo3.png',
                ],
                'sizes' => [39, 40, 41, 42, 43, 44],
            ],
            [
                'name' => 'Adidas Ultraboost 22',
                'thumbnail' => 'assets/images/thumbnails/photo4.png',
                'description' => 'Running Shoes',
                'about' => 'Redefining running comfort with Adidas Ultraboost 22. Primeknit construction, EnergyBoost midsole, and stretchweb outsole for adaptive fit.',
                'price' => 3500000,
                'stock' => 35,
                'category_id' => $categories[1]->id,
                'brand_id' => $brands[1]->id,
                'is_popular' => false,
                'photos' => [
                    'assets/images/thumbnails/photo4.png',
                ],
                'sizes' => [40, 41, 42, 43],
            ],
            [
                'name' => 'Jordan Air Retro High',
                'thumbnail' => 'assets/images/thumbnails/photo7.png',
                'description' => 'Basketball Shoes',
                'about' => 'Michael Jordan\'s signature shoe returns with premium materials and visible Air-Sole unit. Leather upper, nylon sockliner, and herringbone outsole.',
                'price' => 2750000,
                'stock' => 15,
                'category_id' => $categories[3]->id,
                'brand_id' => $brands[2]->id,
                'is_popular' => true,
                'photos' => [
                    'assets/images/thumbnails/photo7.png',
                ],
                'sizes' => [41, 42, 43, 44, 45],
            ],
            [
                'name' => 'Nike LeBron 20',
                'thumbnail' => 'assets/images/thumbnails/photo8.png',
                'description' => 'Basketball Shoes',
                'about' => 'LeBron James\'s twentieth signature shoe features zoom Air units in both heel and forefoot, engineered mesh upper, and multidirectional traction pattern.',
                'price' => 3100000,
                'stock' => 40,
                'category_id' => $categories[3]->id,
                'brand_id' => $brands[0]->id,
                'is_popular' => false,
                'photos' => [
                    'assets/images/thumbnails/photo8.png',
                ],
                'sizes' => [39, 40, 41, 42, 43, 44],
            ],
        ];

        foreach ($shoesData as $data) {
            $photos = $data['photos'];
            $sizes = $data['sizes'];

            unset($data['photos'], $data['sizes']);

            $shoe = Shoe::create($data);

            foreach ($photos as $photo) {
                ShoePhoto::create([
                    'shoe_id' => $shoe->id,
                    'photo' => $photo,
                ]);
            }

            foreach ($sizes as $size) {
                ShoeSize::create([
                    'shoe_id' => $shoe->id,
                    'size' => $size,
                ]);
            }
        }
    }
}

