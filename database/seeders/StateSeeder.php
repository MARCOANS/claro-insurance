<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Leer  Json de Estados
        $json = File::get('database/data/states.json');
        $states = json_decode($json);

        //Crear un  formato  estandar para insertar datos
        $data = [];
        foreach ($states as $state) {
            $data[] = ['id' => $state->id, 'name' => $state->name, 'country_id' => $state->country_id];
        }

        //Insertar  dartos con una sola sentencia
        State::insert($data);
    }
}
