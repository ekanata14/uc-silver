<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Community;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'admin@ucsilver.com',
        // ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@ucsilver.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        // Improved categories
        $categories = [
            [
                'name' => 'Jewelry',
                'description' => 'Rings, necklaces, bracelets, and more crafted from silver and other precious metals.',
            ],
            [
                'name' => 'Silverware',
                'description' => 'Premium silverware products including cutlery, trays, and decorative items.',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Silver accessories such as watches, cufflinks, and hairpins.',
            ],
            [
                'name' => 'Gift Items',
                'description' => 'Special silver gifts for memorable occasions.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Improved communities
        $communities = [
            [
                'name' => 'Silver Enthusiasts',
                'description' => 'A community for people who love silver products, sharing tips and collections.',
                'image' => 'silver_enthusiasts.jpg',
            ],
            [
                'name' => 'Jewelry Makers',
                'description' => 'Connecting jewelry makers around the world to share designs and techniques.',
                'image' => 'jewelry_makers.jpg',
            ],
            [
                'name' => 'Collectors Club',
                'description' => 'For collectors of rare and vintage silver items.',
                'image' => 'collectors_club.jpg',
            ],
        ];

        foreach ($communities as $community) {
            Community::create($community);
        }

        // Seeder for products
        $products = [
            [
                'category_id' => 1,
                'community_id' => 1,
                'name' => 'Classic Silver Ring',
                'description' => 'A timeless silver ring for all occasions.',
                'price' => 250000,
                'stock' => 50,
            ],
            [
                'category_id' => 2,
                'community_id' => 3,
                'name' => 'Vintage Silver Spoon',
                'description' => 'Handcrafted vintage silver spoon, perfect for collectors.',
                'price' => 150000,
                'stock' => 20,
            ],
            [
                'category_id' => 3,
                'community_id' => 2,
                'name' => 'Silver Cufflinks',
                'description' => 'Elegant silver cufflinks for formal events.',
                'price' => 180000,
                'stock' => 35,
            ],
            [
                'category_id' => 4,
                'community_id' => 1,
                'name' => 'Silver Gift Box',
                'description' => 'A beautiful silver box, ideal for gifting.',
                'price' => 300000,
                'stock' => 15,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
