<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Career;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class StudentControllerAdmin extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $careers = Career::all();
        return view('students.create', compact('careers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'carnet' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'id_career' => 'required|exists:careers,id_career',
        ]);

        $user = User::create([
            'email'    => $validated['carnet'].'@uls.edu.sv',
            'password' => Hash::make('1234'),
        ]);
        
        // 3) Creamos el estudiante sin el id_career
        $studentData = Arr::except($validated, ['id_career']);
        $studentData['id_user'] = $user->id; // Asignamos el id del usuario creado
        $student = Student::create($studentData);

        // 4) Insertamos en la tabla pivote student_careers
        $student->careers()->attach($validated['id_career'], ['inscription_date' => now()]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Estudiante creado y matriculado correctamente.');
    }

    public function edit(Student $student)
    {
        $careers = Career::all();
        return view('students.edit', compact('student', 'careers'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'carnet' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id_student . ',id_student',
            'id_career' => 'required|exists:careers,id_career',
        ]);

        $student->update(Arr::except($validated, ['id_career']));
        $student->careers()->sync([$validated['id_career']]);

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
