<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'category_id' => 1,
            'name' => "Iphone"
        ]);
        Brand::create([
            'category_id' => 1,
            'name' => "Samsung"
        ]);
        Brand::create([
            'category_id' => 2,
            'name' => "Redmi"
        ]);
        Brand::create([
            'category_id' => 2,
            'name' => "Realme"
        ]);
        Brand::create([
            'category_id' => 3,
            'name' => "Hp"
        ]);
        Brand::create([
            'category_id' => 3,
            'name' => "Dell"
        ]);
    }
}
