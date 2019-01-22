<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public $guarded = [
        'id',
    ];

    public $rules = [
        'intitule' => 'required|string',
        'temps' => 'required|integer',
        'prix' => 'required|float',

    ];

    public $table = 'demande';
}
