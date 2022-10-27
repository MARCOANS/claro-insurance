<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getStates(Request $request)
    {

        //Obtener id de pais
        $countryId = $request->countryId;

        //Encontrar estado y cargar esatdos
        $country = Country::findOrFail($countryId);
        $states = $country->states;

        //Retornar estados en formato json
        return response()->json($states);
    }
}
