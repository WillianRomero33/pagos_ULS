@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-6">Editar Estudiante</h1>
        <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-4 max-w-xl">
            @csrf
            @method('PUT')
            
            <div>
                <label for="carnet" class="block font-semibold">Carnet</label>
                <input type="text" name="carnet" id="carnet" value="{{ $student->carnet }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div>
                <label for="name" class="block font-semibold">Nombre</label>
                <input type="text" name="name" id="name" value="{{ $student->name }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div>
                <label for="last_name" class="block font-semibold">Apellido</label>
                <input type="text" name="last_name" id="last_name" value="{{ $student->last_name }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div>
                <label for="email" class="block font-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ $student->email }}" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="id_career" class="block text-gray-700 font-medium mb-1">Carrera</label>
                <select
                name="id_career"
                id="id_career"
                class="w-full border rounded p-2 focus:outline-none focus:ring"
                required
                >
                <option value="" disabled>Selecciona una carrera</option>
                @foreach($careers as $career)
                    <option value="{{ $career->id_career }}">
                    {{ $career->career_name }}
                    </option>
                @endforeach
                </select>
                @error('id_career')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
                <a href="{{ route('students.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancelar</a>
            </div>
        </form>
    </main>
</div>
@endsection