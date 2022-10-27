<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Leer  Json de paises
        $json = File::get('database/data/countries.json');
        $countries = json_decode($json);

        //Crear un  formato  estandar para insertar datos
        $data = [];
        foreach ($countries as $country) {
            $data[] = ['id' => $country->id, 'name' => $country->name];
        }

        //Insertar  dartos con una sola sentencia
        Country::insert($data);
    }
}
