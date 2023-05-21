<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(25)
            ->hasReviews(10)
            ->create();
        Product::factory()
            ->count(100)
            ->hasReviews(5)
            ->create();
        Product::factory()
            ->count(100)
            ->hasReviews(3)
            ->create();
        Product::factory()
            ->count(5)
            ->hasReviews(0)
            ->create();
    }
}
