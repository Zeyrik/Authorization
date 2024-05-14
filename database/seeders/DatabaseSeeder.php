<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\ItemStat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(3)->create();
        foreach ($categories as $category) {
            $items = Item::factory()->count(2)->create(['category_id' => $category->id]);
            foreach ($items as $item) {
                ItemStat::factory()->count(3)->create(['item_id' => $item->id]);
            }
        }

    }
}
