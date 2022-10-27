<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crear usuario admin
        User::create([
            'email' => 'admin@gmail.com',
            'password' => '12345678Aa@',
            'name' => 'Admin',
            'identification_card' => '7878788573',
            'birthday' => now()->subYears(18),
            'city_id' => 1,
            'role_id' => 1
        ]);


        for ($i = 0; $i < 30; $i++) {
            User::create([
                'email' => fake()->unique()->safeEmail(),
                'password' => '12345678Aa@',
                'name' => fake()->name(),
                'cellphone' => '997615935',
                'identification_card' => '78787885' . $i,
                'birthday' => now()->subYears(18),
                'city_id' => 1,
                'role_id' => 2
            ]);
        }
    }
}
