<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getCities(Request $request)
    {
        //Obtener id de estado
        $stateId = $request->stateId;

        //Encontrar estado y cargar ciudades
        $state = State::findOrFail($stateId);
        $cities = $state->cities;

        //Retornar ciudades en formato json
        return response()->json($cities);
    }
}
