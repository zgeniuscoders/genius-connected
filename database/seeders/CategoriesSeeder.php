<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [["informatique", 10], ["science", 5], ["culture & art", 5], ["musiques", 10], ["cinema", 15], ["biologie", 5], ["botanie", 3]];
        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category[0],
                'bonus' => $categories[1]
            ]);
        }
    }
}
