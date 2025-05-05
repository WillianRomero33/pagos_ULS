@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row gap-8">
    @include('components.sidebar')

    <section class="w-full lg:w-3/4">
        <!-- Menú de Acciones Rápidas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <a href="{{ route('students.index') }}" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-blue-600 mb-2">
                    <i class="fas fa-user text-3xl"></i>
                </div>
                <h3 class="font-medium">Estudiantes</h3>
            </a>
            <a href="{{ route('careers.index') }}" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-blue-600 mb-2">
                    <i class="fas fa-building-columns text-3xl"></i>
                </div>
                <h3 class="font-medium">Carreras</h3>
            </a>
            <a href="{{ route('semesters.index') }}" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-green-600 mb-2">
                    <i class="fas fa-calendar text-3xl"></i>
                </div>
                <h3 class="font-medium">Semestres</h3>
            </a>
            <a href="{{ route('fees.index') }}" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-purple-600 mb-2">
                    <i class="fas fa-receipt text-3xl"></i>
                </div>
                <h3 class="font-medium">Cargos</h3>
            </a>
        </div>
    </section>
</div>
@endsection