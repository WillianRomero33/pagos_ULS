<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        return response()->json(Fee::all());
    }

    public function store(Request $request)
    {
        $fee = Fee::create($request->all());
        return response()->json($fee, 201);
    }

    public function show($id)
    {
        $fee = Fee::findOrFail($id);
        return response()->json($fee);
    }

    public function update(Request $request, $id)
    {
        $fee = Fee::findOrFail($id);
        $fee->update($request->all());
        return response()->json($fee);
    }

    public function destroy($id)
    {
        Fee::destroy($id);
        return response()->json(null, 204);
    }
}
