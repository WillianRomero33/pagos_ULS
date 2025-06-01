@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <div class="max-w-md mx-auto bg-white p-6 rounded-2xl shadow">
    <h2 class="text-2xl font-semibold mb-6">
      Matricular Semestre para: {{ $student->name }} {{ $student->last_name }}
    </h2>

    {{-- Mensajes de validación / éxito --}}
    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        <strong class="block mb-2">Corrige los siguientes errores:</strong>
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if (session('warning'))
      <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg">
        {{ session('warning') }}
      </div>
    @endif

    <form action="{{ route('students.enroll.store', $student->id_student) }}" method="POST">
      @csrf

      {{-- Selección de semestre --}}
      <div class="mb-4">
        <label for="id_semester" class="block text-gray-700 font-medium mb-1">Semestre</label>
        <select
          name="id_semester"
          id="id_semester"
          class="w-full border rounded p-2 focus:outline-none focus:ring"
          required
        >
          <option value="" disabled selected>Selecciona un semestre</option>
          @foreach($semesters as $sem)
            <option value="{{ $sem->id_semester }}">
              Semestre {{ $sem->semester_number }} - {{ $sem->year }} ({{ $sem->duration_months }} meses)
            </option>
          @endforeach
        </select>
      </div>

      {{-- Botones --}}
      <div class="flex justify-between items-center">
        <a href="{{ route('students.index', $sem->id_semester) }}"
           class="text-gray-600 hover:underline">← Volver</a>
        <button
          type="submit"
          class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700"
        >
          Inscribir
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
