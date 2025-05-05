@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-6">Nueva Carrera</h1>
        <form action="{{ route('careers.store') }}" method="POST" class="space-y-4 max-w-md">
            @csrf
            <div>
                <label for="career_name" class="block font-semibold">Nombre de la carrera</label>
                <input type="text" name="career_name" id="career_name" class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Número de semestres</label>
                <input name="total_semesters" type="number" class="w-full border rounded px-4 py-2" required>
            </div>

            <div class="flex gap-2">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
                <a href="{{ route('careers.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
            </div>
        </form>
    </main>
</div>
@endsection
