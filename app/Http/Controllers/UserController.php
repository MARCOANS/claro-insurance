<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function getUsers(Request $request)
    {

        $data = User::with('city', 'role')->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index()
    {
        $countries = Country::all();
        return view('admin.user', ['countries' => $countries]);
    }


    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'cellphone' => $request->cellphone,
            'identification_card' => $request->cedula,
            'birthday' => $request->birthday,
            'city_id' => $request->city,

        ]);

        return response()->json(['message' => 'Usuario creado']);
    }

    public function verifyDuplicatedEmail(Request $request)
    {
        $userId = $request->userId;

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
            ]
        ]);
        if ($validator->fails()) {
            return response()->json(['isDuplicated' => true]);
        }
        return response()->json(['isDuplicated' => false]);
    }


    public function profile()
    {
        $user = auth()->user()->load('city', 'role');
        return view('profile', ['user' => $user]);
    }
}
