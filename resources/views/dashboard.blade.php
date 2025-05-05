@extends('layouts.app')

@section('content')
<div class="flex flex-col lg:flex-row gap-8">
    @include('components.sidebar', [
        'studentId' => 'PG20230001',
        'career' => 'Lic. en ciencias de la computación',
        'currentTerm' => 'I-2025',
        'currentBalance' => 111,
        'paymentDetails' => [
            ['concepto' => 'Matrícula', 'monto' => 35],
            ['concepto' => 'Papeleria', 'monto' => 15],
            ['concepto' => 'Uso de computo', 'monto' => 16],
            ['concepto' => 'Mensualidad', 'monto' => 45],
        ]
    ])

    <section class="w-full lg:w-3/4">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="college-primary text-white p-4">
                <h2 class="text-lg font-semibold">Calendario de Pagos</h2>
            </div>
            
            <div class="p-4">
                @include('components.payment_card', [
                    'paymentDescription' => 'Semestre I-2023 - Matrícula',
                    'dueStatus' => 'Vence en 5 días',
                    'amount' => 500,
                    'dueDate' => '15/10/2023'
                ])
                
                <h3 class="font-semibold text-lg mb-3">Historial de Pagos</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Fecha</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Monto</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">10/09/2023</td>
                                <td class="px-4 py-3 whitespace-nowrap">Matrícula (Primera Cuota)</td>
                                <td class="px-4 py-3 whitespace-nowrap">$500.00</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Pagado</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">15/08/2023</td>
                                <td class="px-4 py-3 whitespace-nowrap">Inscripción</td>
                                <td class="px-4 py-3 whitespace-nowrap">$150.00</td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Pagado</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Menú de Acciones Rápidas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-blue-600 mb-2">
                    <i class="fas fa-file-invoice-dollar text-3xl"></i>
                </div>
                <h3 class="font-medium">Métodos de Pago</h3>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-green-600 mb-2">
                    <i class="fas fa-receipt text-3xl"></i>
                </div>
                <h3 class="font-medium">Recibos</h3>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow text-center">
                <div class="text-purple-600 mb-2">
                    <i class="fas fa-question-circle text-3xl"></i>
                </div>
                <h3 class="font-medium">Centro de Ayuda</h3>
            </a>
        </div>
    </section>
</div>
@endsection