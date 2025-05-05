@extends('layouts.app')

@section('content')
<div class="flex">
  @include('components.sidebar')
  <main class="flex-1 p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($semester) ? 'Editar' : 'Nuevo' }} Semestre</h1>
    <form method="POST" action="{{ isset($semester) ? route('semesters.update', $semester) : route('semesters.store') }}">
      @csrf
      @if(isset($semester)) @method('PUT') @endif

      <div class="mb-4">
        <label class="block font-semibold">Número de semestre</label>
        <input name="semester_number" type="number" class="w-full border rounded px-4 py-2" value="{{ old('semester_number', $semester->semester_number ?? '') }}" required>
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Duración (meses)</label>
        <input name="duration_months" type="number" class="w-full border rounded px-4 py-2" value="{{ old('duration_months', $semester->duration_months ?? '') }}" required>
      </div>

      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ isset($semester) ? 'Actualizar' : 'Guardar' }}</button>
      <a href="{{ route('semesters.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
  </main>
</div>
@endsection
