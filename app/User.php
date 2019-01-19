<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Watson\Validating\ValidatingModel;

class User extends ValidatingModel
{
    public $guarded = [
        'id',
    ];

    public $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'mail' => 'required|string|email|unique:users',
        'numRue' => 'required|integer',
        'adresse' => 'required|string',
        'cdp' => 'required|integer',
        'ville' => 'required|string',
        'sexe' => 'required|string',
        'telephone' => 'required|integer',
        'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
    ];

    public $table = 'users';
}
