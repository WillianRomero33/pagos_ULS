<div class="border border-yellow-200 bg-yellow-50 rounded-lg p-4 mb-6">
    <div class="flex justify-between items-start">
        <div>
            <h3 class="font-bold text-lg college-accent">Próximo Pago</h3>
            <p class="text-gray-600">{{ $paymentDescription ?? 'Semestre I-2023 - Matrícula' }}</p>
        </div>
        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
            {{ $dueStatus ?? 'Vence en 5 días' }}
        </span>
    </div>
    
    <div class="mt-4 flex justify-between items-center">
        <div>
            <p class="text-2xl font-bold">${{ number_format($amount ?? 500, 2) }}</p>
            <p class="text-sm text-gray-500">Fecha límite: {{ $dueDate ?? '15/03/2023' }}</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium">
            Pagar Ahora
        </button>
    </div>
</div>