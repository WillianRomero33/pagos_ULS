@extends('layouts.app')

@section('content')
<div class="flex">
  @include('components.sidebar')
  <main class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Semestres</h1>
      <a href="{{ route('semesters.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo</a>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Número</th>
          <th class="px-4 py-2">Duración (meses)</th>
          <th class="px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($semesters as $s)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $s->id_semester }}</td>
          <td class="px-4 py-2">{{ $s->semester_number }}</td>
          <td class="px-4 py-2">{{ $s->duration_months }}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="{{ route('semesters.edit', $s) }}" class="text-blue-600 hover:underline">Editar</a>
            <form method="POST" action="{{ route('semesters.destroy', $s) }}" class="inline">
              @csrf @method('DELETE')
              <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
</div>
@endsection
