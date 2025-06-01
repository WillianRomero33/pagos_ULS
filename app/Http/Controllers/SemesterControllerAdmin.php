<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterControllerAdmin extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('semesters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'semester_number' => 'required|integer|min:1',
            'duration_months' => 'required|integer|min:1',
            'year' => 'required|integer|min:2020|max:'.date('Y'),
        ]);

        Semester::create($validated);
        return redirect()->route('semesters.index')->with('success', 'Semestre creado exitosamente.');
    }

    public function edit(Semester $semester)
    {
        return view('semesters.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $validated = $request->validate([
            'semester_number' => 'required|integer|min:1',
            'duration_months' => 'required|integer|min:1',
            'year' => 'required|integer|min:2020|max:'.date('Y'),
        ]);

        $semester->update($validated);
        return redirect()->route('semesters.index')->with('success', 'Semestre actualizado exitosamente.');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect()->route('semesters.index')->with('success', 'Semestre eliminado.');
    }
}