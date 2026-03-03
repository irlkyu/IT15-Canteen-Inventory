<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        $suppliers = collect([
            ['code' => 'SUP-ALPHA', 'name' => 'Alpha Beverages Co.', 'email' => 'orders@alphabeverages.com', 'phone' => '0917-111-2233'],
            ['code' => 'SUP-BRAVO', 'name' => 'Bravo Snacks Ltd.', 'email' => 'sales@bravosnacks.ph', 'phone' => '0917-444-5566'],
            ['code' => 'SUP-CHARLIE', 'name' => 'Charlie Food Services', 'email' => 'support@charliefoods.com', 'phone' => '0917-777-8899'],
        ])->map(fn ($data) => Supplier::create([
            'supplier_code'   => $data['code'],
            'supplier_name'   => $data['name'],
            'contact_email'   => $data['email'],
            'contact_number'  => $data['phone'],
        ]));

        $products = [
            ['code' => 'PRD-SIOPAO', 'name' => 'Siopao (Asado)', 'price' => 35.00],
            ['code' => 'PRD-PANCIT', 'name' => 'Pancit Canton Bowl', 'price' => 45.00],
            ['code' => 'PRD-C2-GREEN', 'name' => 'C2 Green Tea 355ml', 'price' => 32.00],
            ['code' => 'PRD-LUMPIA', 'name' => 'Lumpiang Shanghai (4 pcs)', 'price' => 30.00],
            ['code' => 'PRD-TAPSILOG', 'name' => 'Tapsilog Meal', 'price' => 95.00],
            ['code' => 'PRD-HOTDOG', 'name' => 'Hotdog Sandwich', 'price' => 40.00],
            ['code' => 'PRD-ICETEA', 'name' => 'House Blend Iced Tea', 'price' => 25.00],
            ['code' => 'PRD-RICE-MEAL', 'name' => 'Fried Chicken Rice Meal', 'price' => 89.00],
            ['code' => 'PRD-BANANA-CUE', 'name' => 'Banana Cue Stick', 'price' => 20.00],
            ['code' => 'PRD-TURON', 'name' => 'Turon', 'price' => 18.00],
        ];

        foreach ($products as $index => $data) {
            Product::create([
                'product_code'   => $data['code'],
                'product_name'   => $data['name'],
                'price'          => $data['price'],
                'current_stock'  => rand(3, 10),
            ]);
        }
    }
}
