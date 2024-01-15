<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingType;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articleType = SettingType::create([
            'name' => 'Article Types',
            'desc' => 'Type of Articles like page,post,ads, ...etc'
        ]);

        Setting::create([
            'type_id' => $articleType->id,
            'name' => 'Page',
            'desc' => 'The group of pages like about, contact, ...etc and include static pages'
        ]);

        Setting::create([
            'type_id' => $articleType->id,
            'name' => 'Post',
            'desc' => 'The group of posts or articles like news, articles, ...etc'
        ]);

        Setting::create([
            'type_id' => $articleType->id,
            'name' => 'Ads',
            'desc' => 'The group of advertisements like banners, videos, ...etc'
        ]);
    }
}
