<?php

namespace Database\Seeders;


use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Service::factory()->create([
            'id' => Str::uuid(),
            'title' => 'Laundry and dry cleaning services',
            'description' => 'This service involves washing, drying and folding clothes to ensure they are clean and well-maintained',
            'image_filename' => 'home/assets/img/gallery/about1.png',
            'price' => 200,
            'discount_price' => 100,
        ]);

        Service::factory()->create([
            'id' => Str::uuid(),
            'title' => 'Ironing and folding services', 
            'description' => 'Ironing and folding services involve pressing and smoothing out clothes to prepare them for storage or wear.',
            'image_filename' => 'home/assets/img/gallery/offers1.png',
            'price' => 200,
            'discount_price' => 100,
        ]);

        Service::factory()->create([
            'id' => Str::uuid(),
            'title' => 'Specialized cleaning services',
            'description' => 'Specialized cleaning services for items such as wedding gowns, leather goods, and rugs.',
            'image_filename' => 'home/assets/img/gallery/projects-img2.png',
            'price' => 1000,
            'discount_price' => 100,
        ]);
    }
}
