@extends('layouts.dashboard')

@section('content')
<div class="d-flex flex-column ">

    <h1>Perfil</h1>

    <table class="table my-3 mb-5">

        <tbody>
            <tr>
                <th scope="row " class="bg-dark text-white text-white">Nombre</th>
                <td>{{ $user->name }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Email</th>
                <td>{{ $user->email }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Celular</th>
                <td>{{ $user->cellphone }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Cedula</th>
                <td>{{ $user->identification_card }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Fecha de nacimiento</th>
                <td>{{ $user->birthday }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Edad</th>
                <td>{{$user->age}}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Ciudad</th>
                <td>{{ $user->city->name }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Rol</th>
                <td>{{ $user->role->name }}</td>

            </tr>
            <tr>
                <th scope="row " class="bg-dark text-white">Fecha de creacion</th>
                <td>{{ $user->created_at}}</td>

            </tr>
        </tbody>
    </table>
</div>
@endsection