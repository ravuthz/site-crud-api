<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'desc' => 'Promote Article to Static or Dynamic Page'
        ]);

        Setting::create([
            'type_id' => $articleType->id,
            'name' => 'Page',
            'desc' => 'Promote Article to Static or Dynamic Page'
        ]);

        Setting::create([
            'type_id' => $articleType->id,
            'name' => 'Page',
            'desc' => 'Promote Article to Static or Dynamic Page'
        ]);
    }
}
