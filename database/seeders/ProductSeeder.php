<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productsByCategory = [
            'sembako' => [
                ['name' => 'Beras Premium 5kg', 'price' => 75000, 'stock' => 40],
                ['name' => 'Beras Medium 5kg', 'price' => 60000, 'stock' => 50],
                ['name' => 'Minyak Goreng Sania 2L', 'price' => 32000, 'stock' => 60],
                ['name' => 'Minyak Goreng Bimoli 1L', 'price' => 17000, 'stock' => 80],
                ['name' => 'Gula Pasir 1kg', 'price' => 16000, 'stock' => 100],
                ['name' => 'Tepung Terigu Segitiga Biru 1kg', 'price' => 14000, 'stock' => 70],
                ['name' => 'Telur Ayam 1kg', 'price' => 28000, 'stock' => 45],
            ],
            'minuman' => [
                ['name' => 'Teh Botol Sosro 350ml', 'price' => 4500, 'stock' => 120],
                ['name' => 'Aqua 600ml', 'price' => 4000, 'stock' => 200],
                ['name' => 'Le Minerale 600ml', 'price' => 4000, 'stock' => 150],
                ['name' => 'Pocari Sweat 500ml', 'price' => 9000, 'stock' => 60],
                ['name' => 'Kopi Kapal Api Mix Sachet', 'price' => 2000, 'stock' => 250],
                ['name' => 'Nescafe Classic Sachet', 'price' => 2500, 'stock' => 180],
                ['name' => 'Susu Ultra 250ml', 'price' => 6500, 'stock' => 90],
            ],
            'snack-cemilan' => [
                ['name' => 'Indomie Goreng', 'price' => 3500, 'stock' => 300],
                ['name' => 'Indomie Soto', 'price' => 3500, 'stock' => 250],
                ['name' => 'Chitato Sapi Panggang', 'price' => 9500, 'stock' => 80],
                ['name' => 'Taro Snack', 'price' => 2500, 'stock' => 150],
                ['name' => 'Beng Beng', 'price' => 2500, 'stock' => 200],
                ['name' => 'Silverqueen Cashew', 'price' => 15000, 'stock' => 50],
                ['name' => 'Oreo Original', 'price' => 7000, 'stock' => 100],
            ],
            'bumbu-dapur' => [
                ['name' => 'Bawang Putih 250g', 'price' => 9000, 'stock' => 60],
                ['name' => 'Bawang Merah 250g', 'price' => 10000, 'stock' => 65],
                ['name' => 'Cabe Rawit 100g', 'price' => 8000, 'stock' => 40],
                ['name' => 'Royco Ayam Sachet', 'price' => 500, 'stock' => 400],
                ['name' => 'Masako Sapi Sachet', 'price' => 500, 'stock' => 400],
                ['name' => 'Saos Tomat ABC 135ml', 'price' => 8500, 'stock' => 90],
                ['name' => 'Kecap Manis Bango 135ml', 'price' => 10500, 'stock' => 85],
            ],
            'personal-care' => [
                ['name' => 'Pepsodent Pasta Gigi 75g', 'price' => 8500, 'stock' => 70],
                ['name' => 'Sikat Gigi Formula', 'price' => 12000, 'stock' => 50],
                ['name' => 'Sabun Mandi Lifebuoy', 'price' => 4500, 'stock' => 120],
                ['name' => 'Shampoo Pantene Sachet', 'price' => 1500, 'stock' => 300],
                ['name' => 'Pembalut Charm Reguler', 'price' => 15000, 'stock' => 60],
                ['name' => 'Pampers Bayi M', 'price' => 45000, 'stock' => 35],
            ],
            'frozen-food' => [
                ['name' => 'Nugget Fiesta 500g', 'price' => 38000, 'stock' => 40],
                ['name' => 'Bakso Sapi 500g', 'price' => 32000, 'stock' => 35],
                ['name' => 'Sosis So Nice 500g', 'price' => 28000, 'stock' => 50],
                ['name' => 'Kentang Goreng Beku 1kg', 'price' => 35000, 'stock' => 30],
                ['name' => 'Dimsum Frozen', 'price' => 25000, 'stock' => 45],
            ],
            'alat-tulis' => [
                ['name' => 'Buku Tulis Sinar Dunia 38lbr', 'price' => 4000, 'stock' => 150],
                ['name' => 'Pulpen Standard AE-7', 'price' => 2500, 'stock' => 200],
                ['name' => 'Pensil 2B Faber Castell', 'price' => 4500, 'stock' => 180],
                ['name' => 'Penghapus Stationery', 'price' => 2000, 'stock' => 250],
                ['name' => 'Penggaris 30cm', 'price' => 5000, 'stock' => 100],
            ],
        ];

        $categories = Category::query()->pluck('id', 'slug');

        foreach ($productsByCategory as $slug => $products) {
            if (! isset($categories[$slug])) {
                continue;
            }

            foreach ($products as $data) {
                Product::firstOrCreate(
                    [
                        'category_id' => $categories[$slug],
                        'name' => $data['name'],
                    ],
                    [
                        'price' => $data['price'],
                        'stock' => $data['stock'],
                    ],
                );
            }
        }
    }
}
