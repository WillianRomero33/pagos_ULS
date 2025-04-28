<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        return response()->json(Semester::all());
    }

    public function store(Request $request)
    {
        $semester = Semester::create($request->all());
        return response()->json($semester, 201);
    }

    public function show($id)
    {
        $semester = Semester::findOrFail($id);
        return response()->json($semester);
    }

    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);
        $semester->update($request->all());
        return response()->json($semester);
    }

    public function destroy($id)
    {
        Semester::destroy($id);
        return response()->json(null, 204);
    }
}
