<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Artisan::call('passport:install --uuids');
        // dd(Artisan::output());

        $this->call([
            SettingSeeder::class,
            ArticleSeeder::class,
        ]);

        User::create([
            "first_name" => "Zee",
            "last_name" => "Admin",
            "phone" => "0964577770",
            "email" => "adminz@gmail.com",
            "username" => "adminz",
            "password" => bcrypt('123123')
        ]);
    }
}
