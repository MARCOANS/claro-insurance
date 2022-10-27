<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'cellphone',
        'identification_card',
        'birthday',
        'city_id',
        'role_id'
    ];


    protected $appends = ['age'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Calcular Edad
    protected function age(): Attribute
    {
        return new Attribute(
            get: fn () =>  Carbon::parse($this->attributes['birthday'])->age,
        );
    }

    //Encriptar contraseña
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value,) => Hash::make($value),
        );
    }


    //Ciudad del usuario
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    //Rol del usuario
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
