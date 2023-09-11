<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use App\Models\InformationContact;
use App\Models\SellingFeature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            BannerSeeder::class
        ]);
        $this->call([
            SliderSeeder::class
        ]);
        $this->call([
            InformationContactSeeder::class
        ]);
        $this->call([
            MessageSeeder::class
        ]);
        $this->call([
            BranchSeeder::class
        ]);
        $this->call([
            SellingFeatureSeeder::class
        ]);
    }
}
