<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => "Placa de vídeo Gigabyte GeForce GTX 3060 12GB GDDR6",
            'price' => 2595.50,
            'quantity' => 1,
            'image' => "images/placa.png",
        ]);

        Product::create([
            'name' => "Placa de vídeo Gigabyte GeForce GTX 3060 12GB GDDR6",
            'price' => 2595.50,
            'quantity' => 2,
            'image' => "images/placa.png",
        ]);
    }
}
