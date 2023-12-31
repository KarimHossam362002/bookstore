<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


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
            ContactMessageSeeder::class
        ]);
        $this->call([
            BranchSeeder::class
        ]);
        $this->call([
            SellingFeatureSeeder::class
        ]);
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            CategorySeeder::class
        ]);
        $this->call([
            ProductSeeder::class
        ]);
        $this->call([
            TagSeeder::class
        ]);
        $this->call([
            FaqSeeder::class
        ]);
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            WishlistSeeder::class
        ]);
    }
}
