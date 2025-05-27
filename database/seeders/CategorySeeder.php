<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Politički', 'Lifestyle', 'Sport', 'Nauka', 'Zabava'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}

