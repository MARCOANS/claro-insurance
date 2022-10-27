<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class,
            CitySeeder2::class,
            CitySeeder3::class,
            CitySeeder4::class,
            CitySeeder5::class,
            RoleSeeder::class,
            UserSeeder::class

        ]);
    }
}
