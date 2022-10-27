<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //Leer  Json de ciudades
        $json1 = File::get('database/data/cities-3.json');
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


        //Leer  Json de ciudades
        /*   $json2 = File::get('database/data/cities-2.json');
        $cities2 = json_decode($json2); */
        //$this->_execInsertForGroup($cities2);
    }

    public function _execInsertForGroup($cities)
    {
        //Dividir el arrglo en grupso de 1000
        $cityGroups = array_chunk($cities, 1000);


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
