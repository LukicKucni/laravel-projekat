<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazine;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Magazine::create([
            'title' => 'Tech Innovations',
            'description' => 'Latest trends and innovations in technology.',
            'cover' => 'magazine1.png',
            'price' => 5.99,
            'release_date' => now(),
            'featured' => false,
            'category_id' => rand(1, 5),

        ]);

        Magazine::create([
            'title' => 'Health & Wellness',
            'description' => 'Your guide to a healthier lifestyle.',
            'cover' => 'magazine2.png',
            'price' => 4.99,
            'release_date' => now(),
            'featured' => true,
            'category_id' => rand(1, 5),

        ]);
        Magazine::create([
            'title' => 'Travel Adventures',
            'description' => 'Explore the world with our travel guides.',
            'cover' => 'magazine3.png',
            'price' => 6.99,
            'release_date' => now(),
            'featured' => true,
            'category_id' => rand(1, 5),

        ]);
        Magazine::create([
            'title' => 'Culinary Delights',
            'description' => 'Discover new recipes and culinary techniques.',
            'cover' => 'magazine4.png',
            'price' => 3.99,
            'release_date' => now(),
            'featured' => true,
            'category_id' => rand(1, 5),

        ]);
        Magazine::create([
            'title' => 'Fashion Trends',
            'description' => 'Stay updated with the latest fashion trends.',
            'cover' => 'magazine5.png',
            'price' => 4.49,
            'release_date' => now(),
            'featured' => false,
            'category_id' => rand(1, 5),

        ]);
    }
}
