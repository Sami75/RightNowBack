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

        $data = QueryBuilder::for(User::class)
            ->paginate()
        ;

        return response()->json($data);
    }

    public function show(User $user)
    {
        return response()->json([
            'data' => $user->toArray(),
        ]);
    }

	public function store(Request $request, User $user)
    {
        $user = new User();
        $user->fillFromRequest();
        $user->saveOrFail();

        $user = User::find($user->id);

        return response()->json([
            'data' => User::all()->toArray(),
        ]);

    }

    public function update(Request $request, User $user)
    {
        $user->fillFromRequest();
        $user->saveOrFail();

        if (!$user->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        $user = User::find($user->id);

        return response()->json([
            'data' => User::find($user->id)->toArray(),
        ]);
    }

    public function destroy(User $user)
    {

        $user->delete();

        return abort(Response::HTTP_NO_CONTENT);
    }

/*    public function login(Request $request, User $user)
    {
        $user->fillFromRequest();
        $user = User::find($user->mail);
    }
}*/

