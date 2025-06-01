@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Estudiantes</h1>
            <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Estudiante</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Nombre</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Carrera</th>
                        <th class="py-2 px-4 border-b">Estado</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b">{{ $student->carnet }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->name }} {{ $student->last_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $student->careers->first()->career_name }}</td>
                            <td class="py-2 px-4 border-b">
                                @if($student->active)
                                    <span class="text-green-600 font-semibold">Activo</span>
                                @else
                                    <span class="text-red-600 font-semibold">Inactivo</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b space-x-2">
                                <a href="{{ route('students.edit', $student) }}" class="text-blue-600 hover:underline">Editar</a>
                                <a href="{{ route('students.enroll.create', ['student' => $student->id_student]) }}" 
                                    class="text-green-600 hover:underline"
                                    >
                                    Matricular
                                </a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar este estudiante?')">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
