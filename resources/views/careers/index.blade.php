@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')
    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Carreras</h1>
            <a href="{{ route('careers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Carrera</a>
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
                        <th class="py-2 px-4 border-b">Total de semestres</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $career)
                        <tr>
                            <td class="py-2 px-4 border-b text-center">{{ $career->id_career }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $career->career_name }}</td>
                            <td class="py-2 px-4 border-b text-center">{{ $career->total_semesters }}</td>
                            <td class="py-2 px-4 border-b space-x-2 text-center">
                                <a href="{{ route('careers.edit', $career) }}" class="text-blue-600 hover:underline">Editar</a>
                                <form action="{{ route('careers.destroy', $career) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" onclick="return confirm('¿Eliminar esta carrera?')">Eliminar</button>
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
