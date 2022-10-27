<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder4 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Leer  Json de ciudades
        $json1 = File::get('database/data/cities-4.json');
        $cities1 = json_decode($json1);
        $cityGroups = array_chunk($cities1, 1000);

        //Iterar cada grupo creado
        foreach ($cityGroups as $cityGroup) {

            $data = [];
            //Crear un  formato  estandar para insertar datos
            foreach ($cityGroup as $city) {
                $data[] = ['id' => $city->id, 'name' => $city->name, 'state_id' => $city->state_id];
            }

            //Insertar  dartos con una sola sentencia
            City::insert($data);
        }
    }
}
