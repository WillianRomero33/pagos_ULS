<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Semester;
use App\Models\PaymentDetail;
use App\Models\Fee;

class EnrollmentController extends Controller
{
    /**
     * Muestra el formulario para matricular un semestre.
     */
    public function create(Student $student)
    {
        $semesters = Semester::all();
        return view('students.enroll', compact('student', 'semesters'));
    }

    /**
     * Procesa la matrícula: 
     *  - Inserta en student_semesters
     *  - Crea 1 registro de matrícula + 6 cuotas en fees
     */
    public function store(Request $request, Student $student)
    {
        $v = $request->validate([
            'id_semester' => 'required|exists:semesters,id_semester',
        ]);

        // 1) Ya matriculado?
        if ($student->semesters()
            ->wherePivot('id_semester', $v['id_semester'])
            ->exists()
        ) {
            return back()->with('warning', 'El alumno ya está inscrito en ese semestre.');
        }

        // 2) Inserta en pivot student_semesters
        $student->semesters()->attach($v['id_semester'], [
            'start_date' => now(),
            'status'     => 'En Curso',
        ]);

        // 3) Genera matrícula + 6 cuotas en fees
        // -- 3.1 Matrícula
        $matricula = Fee::where('description', 'Matricula')->first();
        $student->paymentDetails()->create([
            'id_semester' => $v['id_semester'],
            'id_fee' => $matricula->id_fee,
            'amount' => $matricula->amount,
        ]);

        $semester = Semester::find($v['id_semester']);
        $semNumber = $semester->semester_number;
        // -- 3.2 Seis cuotas
        $cuota = Fee::where('description', 'Cuota Ordinaria')->first();
        for ($i = 1; $i <= 6; $i++) {
            $monthId = ($semNumber == 2) ? $i + 6 : $i;
            $student->paymentDetails()->create([
                'id_semester' => $v['id_semester'],
                'id_fee' => $cuota->id_fee,
                'id_month' => $monthId,
                'amount' => $cuota->amount,
            ]);
        }

        return redirect()
            ->route('students.index')
            ->with('success', 'Semestre inscrito y cuotas generadas correctamente.');
    }
}
