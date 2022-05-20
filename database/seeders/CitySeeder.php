<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        City::create(['name' => 'غزة']);
        City::create(['name' => 'دير البلح']);
        City::create(['name' => 'خانيونس']);
        City::create(['name' => 'النصيرات']);
        City::create(['name' => 'البريج']);
        City::create(['name' => 'المغازي']);
        City::create(['name' => 'رفح']);
        City::create(['name' => 'الزوايدة']);
        City::create(['name' => 'جباليا']);
        City::create(['name' => 'بيت لاهيا']);
        City::create(['name' => 'بيت حانون']);
    }
}
