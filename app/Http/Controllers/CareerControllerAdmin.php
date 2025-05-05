<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerControllerAdmin extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return view('careers.index', compact('careers'));
    }

    public function create()
    {
        return view('careers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'career_name' => 'required|string|max:255',
            'total_semesters' => 'required|integer|min:1',
        ]);

        Career::create($validated);
        return redirect()->route('careers.index')->with('success', 'Carrera creada exitosamente.');
    }

    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'career_name' => 'required|string|max:255',
            'total_semesters' => 'required|integer|min:1',
        ]);

        $career->update($validated);
        return redirect()->route('careers.index')->with('success', 'Carrera actualizada exitosamente.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('careers.index')->with('success', 'Carrera eliminada exitosamente.');
    }
}
