<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(10)->create()->each(function ($category) {
            Article::factory()->count(5)->create(['category_id' => $category->id]);
        });

        $typePage = Setting::where('name', 'Page')->first();
        if ($typePage) {
            Article::factory()->count(3)->create(['type_id' => $typePage->id]);
        }

        $typePost = Setting::where('name', 'Post')->first();
        if ($typePost) {
            Article::factory()->count(10)->create(['type_id' => $typePost->id]);
        }

        $typeAds = Setting::where('name', 'Ads')->first();
        if ($typeAds) {
            Article::factory()->count(5)->create(['type_id' => $typeAds->id]);
        }
    }
}
