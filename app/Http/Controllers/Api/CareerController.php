<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerControllerAdmin extends Controller
{
    public function index()
    {
        return response()->json(Career::all());
    }

    public function store(Request $request)
    {
        $career = Career::create($request->all());
        return response()->json($career, 201);
    }

    public function show($id)
    {
        $career = Career::findOrFail($id);
        return response()->json($career);
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        $career->update($request->all());
        return response()->json($career);
    }

    public function destroy($id)
    {
        Career::destroy($id);
        return response()->json(null, 204);
    }
}
