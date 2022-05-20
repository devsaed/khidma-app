<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'SuperAdmin',
            'email' => 'email@admin.com',
            'password' => Hash::make(12345),
            'mobile' => '594373011'
        ]);
    }
}
