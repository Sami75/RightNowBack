<?php

namespace App\Http\Controllers;

use App\Pro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilder;


class ProEndpoint extends Controller 
{

	public function index()
    {

        $data = QueryBuilder::for(Pro::class)
            ->paginate()
        ;

        return response()->json($data);
    }

    public function show(Pro $pro)
    {
        return response()->json([
            'data' => $pro->toArray(),
        ]);
    }

	public function store(Request $request, Pro $pro)
    {
        $pro = new Pro();
        $pro->fillFromRequest();
        $pro->saveOrFail();

        $pro = Pro::find($pro->id);

        return response()->json([
            'data' => Pro::all()->toArray(),
        ]);

    }

    public function update(Request $request, Pro $pro)
    {
        $pro->fillFromRequest();
        $pro->saveOrFail();

        if (!$pro->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $pro = Pro::find($pro->id);

        return response()->json([
            'data' => Pro::find($pro->id)->toArray(),
        ]);
    }

    public function destroy(Pro $pro)
    {

        $pro->delete();

        return abort(Response::HTTP_NO_CONTENT);
    }

