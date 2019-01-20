<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilder;


class UsersEndpoint extends Controller 
{

	public function index()
    {

        $data = User::all();

        return response()->json([
            'data' => $data->toArray(),
        ]);
    }

    public function show(User $user)
    {

        return response()->json([
            'data' => $user->toArray(),
        ]);
    }

	public function store(Request $request)
    {
        $user = new User([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'password' => $request->password,
            'numRue' => $request->numRue,
            'adresse' => $request->adresse,
            'cdp' => $request->cdp,
            'ville' => $request->ville,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
        ]);

        $user->save();

        $user = User::find($user->id);

        return response()->json([
            'data' => User::all()->toArray(),
        ]);

    }

    public function update(Request $request, User $user)
    {
/*        $user->fillFromRequest();
        $user->saveOrFail();

        if (!$user->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        $user = User::find($user->id);

        return response()->json([
            'data' => User::find($user->id)->toArray(),
        ]);*/
    }

    public function destroy(User $user)
    {

        $user->delete();

        return abort(Response::HTTP_NO_CONTENT);
    }

    public function login(Request $request) {

        $user = User::where('mail', $request->mail)->first();
        return($user);
        if(isset($user)) {
            if($user->password == $request->password) {
                return response()->json([
                    'data' => $user->toArray(),
                ]);
            } else {
                return response()->json([
                    'data' => 'Wrong password',
                ]);
            }
        } else {    
            return response()->json([
                'data' => 'Wrong password or mail',
            ]);
        }

    }
}

