@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row gap-8">
    <!-- Sidebar -->
    @include('components.sidebar', [
        'studentId' => 'ADM2023001',
        'career' => 'Administración',
        'currentTerm' => 'I-2023',
        'currentBalance' => 'N/A',
        'paymentDetails' => [
            ['concepto' => 'Acceso administrativo', 'monto' => 0]
        ]
    ])

    <!-- Contenido Principal -->
    <section class="w-full lg:w-3/4">
        @include('components./addCareer/formCareer', [
            'title' => 'Registrar Nueva Carrera',
            'action' => '#',
            'submitText' => 'Guardar Carrera'
        ])
    </section>
</div>
@endsection