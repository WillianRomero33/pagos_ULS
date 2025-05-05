<aside class="w-full lg:w-1/4">
    <!-- Información Rápida -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="college-primary text-white p-4">
            <h2 class="text-lg font-semibold">Resumen Rápido</h2>
        </div>
        
        <div class="p-4">
            <div class="flex items-center space-x-3 mb-4">
                <div class="p-3 rounded-full bg-blue-100 text-blue-800">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Carnet</p>
                    <p class="font-medium">{{ $studentId ?? 'ST20230001' }}</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3 mb-4">
                <div class="p-3 rounded-full bg-green-100 text-green-800">
                    <i class="fas fa-book"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Carrera</p>
                    <p class="font-medium">{{ $career ?? 'Lic. en ciencias de la computación' }}</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <div class="p-3 rounded-full bg-purple-100 text-purple-800">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Ciclo Actual</p>
                    <p class="font-medium">{{ $currentTerm ?? 'I-2023' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Estado de Pago -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="college-primary text-white p-4">
            <h2 class="text-lg font-semibold">Estado de Pagos</h2>
        </div>
        
        <div class="p-4">
            <div class="mb-3">
                <p class="text-sm text-gray-500">Balance Actual</p>
                <p class="text-2xl font-bold">${{ number_format(floatval($currentBalance ?? 1250), 2) }}</p>
            </div>
            
            <div class="space-y-2">
                @foreach($paymentDetails ?? [
                    ['concepto' => 'Matrícula', 'monto' => 1000],
                    ['concepto' => 'Biblioteca', 'monto' => 150],
                    ['concepto' => 'Actividades', 'monto' => 100]
                ] as $detail)
                <div class="flex justify-between">
                    <span>{{ $detail['concepto'] }}</span>
                    <span class="font-medium">${{ number_format($detail['monto'], 2) }}</span>
                </div>
                @endforeach
            </div>
            
            <button class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md font-medium transition-colors">
                Realizar Pago
            </button>
        </div>
    </div>
</aside>