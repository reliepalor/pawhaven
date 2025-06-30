<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\MobilePhone;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PetsSeeder::class,
        ]);

        // Create sample mobile phones
        MobilePhone::create([
            'brand' => 'Apple',
            'phone_name' => 'iPhone 15 Pro',
            'price' => 89999.00,
            'description' => 'Latest iPhone with A17 Pro chip, titanium design, and advanced camera system.',
            'stock_quantity' => 15,
            'status' => 'In Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Samsung',
            'phone_name' => 'Galaxy S24 Ultra',
            'price' => 79999.00,
            'description' => 'Premium Android flagship with S Pen, advanced AI features, and titanium frame.',
            'stock_quantity' => 12,
            'status' => 'In Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Xiaomi',
            'phone_name' => 'Redmi Note 13 Pro',
            'price' => 15999.00,
            'description' => 'Mid-range powerhouse with 200MP camera and fast charging.',
            'stock_quantity' => 25,
            'status' => 'In Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Vivo',
            'phone_name' => 'V25 Pro',
            'price' => 24999.00,
            'description' => 'Camera-focused smartphone with Zeiss optics and professional photography features.',
            'stock_quantity' => 0,
            'status' => 'Out of Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Realme',
            'phone_name' => 'GT Neo 5',
            'price' => 18999.00,
            'description' => 'Gaming-focused device with 240W fast charging and high refresh rate display.',
            'stock_quantity' => 8,
            'status' => 'In Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Apple',
            'phone_name' => 'iPhone 14',
            'price' => 59999.00,
            'description' => 'Reliable iPhone with excellent camera and performance.',
            'stock_quantity' => 0,
            'status' => 'Out of Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Samsung',
            'phone_name' => 'Galaxy A55',
            'price' => 22999.00,
            'description' => 'Mid-range Samsung with great value and solid performance.',
            'stock_quantity' => 18,
            'status' => 'In Stock',
        ]);

        MobilePhone::create([
            'brand' => 'Xiaomi',
            'phone_name' => 'POCO X6 Pro',
            'price' => 17999.00,
            'description' => 'Performance-focused device with MediaTek Dimensity processor.',
            'stock_quantity' => 10,
            'status' => 'In Stock',
        ]);
    }
}
