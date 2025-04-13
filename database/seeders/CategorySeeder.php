<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'clothing']);
        Category::create(['name' => 'accessories']);
        Category::create(['name' => 'sport']);
        
        DB::table('categories')->insert([
            ['name' => 'Oranges', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lemons', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Limes', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
