@extends('layouts.app')

@section('content')
<div class="flex">
  @include('components.sidebar')
  <main class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Cargos</h1>
      <a href="{{ route('fees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva</a>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border text-left">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Monto</th>
          <th class="px-4 py-2">Descripción</th>
          <th class="px-4 py-2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($fees as $f)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $f->id_fee }}</td>
          <td class="px-4 py-2">${{ number_format($f->amount, 2) }}</td>
          <td class="px-4 py-2">{{ $f->description }}</td>
          <td class="px-4 py-2 space-x-2">
            <a href="{{ route('fees.edit', $f) }}" class="text-blue-600 hover:underline">Editar</a>
            <form method="POST" action="{{ route('fees.destroy', $f) }}" class="inline">
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
