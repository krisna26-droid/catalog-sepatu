<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Shoe;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shoes = [
            [
                'name' => 'Nike Air Jordan 1 High',
                'brand' => 'Nike',
                'price' => 2500000,
                'description' => 'Sepatu basket ikonik dengan desain klasik dan kenyamanan maksimal.',
                'image' => 'shoes/jordan1.jpg',
                'stock' => 4,
            ],
            [
                'name' => 'Adidas Ultraboost 22',
                'brand' => 'Adidas',
                'price' => 2200000,
                'description' => 'Sepatu lari dengan teknologi Boost untuk energi yang tak terbatas.',
                'image' => 'shoes/ultraboost.jpg',
                'stock' => 15,
            ],
            [
                'name' => 'Vans Old Skool Black White',
                'brand' => 'Vans',
                'price' => 900000,
                'description' => 'Sepatu skate klasik dengan garis samping ikonik.',
                'image' => 'shoes/vans-oldskool.jpg',
                'stock' => 25,
            ],
            [
                'name' => 'Converse Chuck Taylor All Star',
                'brand' => 'Converse',
                'price' => 800000,
                'description' => 'Sepatu kanvas legendaris yang cocok untuk segala gaya.',
                'image' => 'shoes/converse-chucktaylor.jpg',
                'stock' => 30,
            ],
            [
                'name' => 'Puma RS-X3 Puzzle',
                'brand' => 'Puma',
                'price' => 1500000,
                'description' => 'Sepatu lifestyle dengan desain futuristik dan kenyamanan tinggi.',
                'image' => 'shoes/puma-rsx3.jpg',
                'stock' => 20,
            ],
            [
                'name' => 'New Balance 990v5',
                'brand' => 'New Balance',
                'price' => 2000000,
                'description' => 'Sepatu lari premium dengan dukungan dan stabilitas optimal.',
                'image' => 'shoes/newbalance-990v5.jpg',
                'stock' => 12,
            ],
            [
                'name' => 'Reebok Classic Leather',
                'brand' => 'Reebok',
                'price' => 1000000,
                'description' => 'Sepatu klasik dengan desain timeless dan kenyamanan yang luar biasa.',
                'image' => 'shoes/reebok-classic.jpg',
                'stock' => 18,
            ],
            [
                'name' => 'Asics Gel-Kayano 28',
                'brand' => 'Asics',
                'price' => 1800000,
                'description' => 'Sepatu lari dengan teknologi Gel untuk penyerapan kejutan yang superior.',
                'image' => 'shoes/asics-gelkayano.jpg',
                'stock' => 14,
            ],
            [
                'name' => 'Under Armour HOVR Phantom 2',
                'brand' => 'Under Armour',
                'price' => 1600000,
                'description' => 'Sepatu lari dengan teknologi HOVR untuk energi yang kembali setiap langkah.',
                'image' => 'shoes/underarmour-hovr.jpg',
                'stock' => 16,
            ],
            [
                'name' => 'Balenciaga Triple S',
                'brand' => 'Balenciaga',
                'price' => 8000000,
                'description' => 'Sepatu fashion dengan desain chunky yang menjadi tren di kalangan selebriti.',
                'image' => 'shoes/balenciaga-triples.jpg',
                'stock' => 5,
            ],
            [
                'name' => 'Gucci Rhyton Leather Sneaker',
                'brand' => 'Gucci',
                'price' => 7000000,
                'description' => 'Sepatu mewah dengan desain retro dan logo ikonik Gucci.',
                'image' => 'shoes/gucci-rhyton.jpg',
                'stock' => 0,
            ],
            [
                'name' => 'Louis Vuitton Archlight',
                'brand' => 'Louis Vuitton',
                'price' => 9000000,
                'description' => 'Sepatu fashion dengan desain futuristik dan siluet unik.',
                'image' => 'shoes/louisvuitton-archlight.jpg',
                'stock' => 6,
            ],
            [
                'name' => 'Prada Cloudbust Thunder',
                'brand' => 'Prada',
                'price' => 8500000,
                'description' => 'Sepatu fashion dengan desain avant-garde dan teknologi tinggi.',
                'image' => 'shoes/prada-cloudbust.jpg',
                'stock' => 7,
            ],
            [
                'name' => 'Alexander McQueen Oversized Sneaker',
                'brand' => 'Alexander McQueen',
                'price' => 7500000,
                'description' => 'Sepatu fashion dengan desain oversized yang menjadi favorit di kalangan fashionista.',
                'image' => 'shoes/mcqueen-oversized.jpg',
                'stock' => 9,
            ],
                [
                'name' => 'Off-White x Nike Air Presto',
                'brand' => 'Off-White',
                'price' => 3000000,
                'description' => 'Sepatu kolaborasi dengan desain unik dan detail khas Off-White.',
                'image' => 'shoes/offwhite-presto.jpg',
                'stock' => 11,
            ],
                [
                'name' => 'Yeezy Boost 350 V2',
                'brand' => 'Adidas',
                'price' => 4000000,
                'description' => 'Sepatu kolaborasi dengan Kanye West yang sangat populer di kalangan sneakerhead.',
                'image' => 'shoes/yeezy-350v2.jpg',
                'stock' => 13,
            ],
        ];

        foreach ($shoes as $shoe) {
            Shoe::create($shoe);
        }
    }
}
