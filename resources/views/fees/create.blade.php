@extends('layouts.app')

@section('content')
<div class="flex">
  @include('components.sidebar')
  <main class="flex-1 p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($fee) ? 'Editar' : 'Nueva' }} Cuota</h1>
    <form method="POST" action="{{ isset($fee) ? route('fees.update', $fee) : route('fees.store') }}">
      @csrf
      @if(isset($fee)) @method('PUT') @endif

      <div class="mb-4">
        <label class="block font-semibold">Monto</label>
        <input name="amount" type="number" step="0.01" class="w-full border rounded px-4 py-2" required>
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Descripción</label>
        <input name="description" type="text" class="w-full border rounded px-4 py-2" required>
      </div>

      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ isset($fee) ? 'Actualizar' : 'Guardar' }}</button>
      <a href="{{ route('fees.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
    </form>
  </main>
</div>
@endsection
