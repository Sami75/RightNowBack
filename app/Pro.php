<?php

namespace App;

use Watson\Validating\ValidatingModel;

class Pro extends ValidatingModel
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
        'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|confirmed',
        'metier' => 'required|string',
    ];

    public $table = 'pro';    
}
