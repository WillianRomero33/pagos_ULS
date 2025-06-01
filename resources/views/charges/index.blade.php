@extends('layouts.app')

@section('content')
<div class="flex">
  @include('components.sidebar')
  <main class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Cargos</h1>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Carnet</th>
          <th class="px-4 py-2">Estudiante</th>
          <th class="px-4 py-2">Descripción</th>
          <th class="px-4 py-2">Monto</th>
          <th class="px-4 py-2">Estado</th>
          <!-- <th class="px-4 py-2">Acciones</th> -->
        </tr>
      </thead>
      <tbody>
        @foreach($charges as $charge)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $charge->id}}</td>
          <td class="px-4 py-2">{{ $charge->student->carnet}}</td>
          <td class="px-4 py-2">{{ $charge->student->last_name }} {{ $charge->student->name }}</td>
          <td class="px-4 py-2">{{ $charge->fee->description }} -
            @if($charge->month)
              {{ $charge->month->name }}
            @endif {{ $charge->semester->year }}</td>
          <td class="px-4 py-2">${{ number_format($charge->amount, 2) }}</td>
          <td class="px-4 py-2">{{ $charge->status }}</td>
          <!-- <td class="px-4 py-2 space-x-2">
            <a href="{{ route('payments.edit', $charge) }}" class="text-blue-600 hover:underline">Editar</a>
            <form method="POST" action="{{ route('payments.destroy', $charge) }}" class="inline">
              @csrf @method('DELETE')
              <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar?')">Eliminar</button>
            </form>
          </td> -->
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>
</div>
@endsection
