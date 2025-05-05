<div class="max-w-3xl mx-auto">
    <!-- Título y botón de regreso -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-graduation-cap college-accent mr-2"></i>
            {{ $title ?? 'Agregar Nueva Carrera' }}
        </h1>
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-1"></i> Volver al inicio
        </a>
    </div>
    
    <!-- Formulario -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="college-primary text-white p-4">
            <h2 class="text-lg font-semibold">Datos de la Carrera</h2>
        </div>
        
        <div class="p-6">
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ $action }}" method="POST">
                @csrf
                @method($method ?? 'POST')

                <!-- Campos del formulario -->
                <div class="mb-4">
                    <label for="career_name" class="block text-sm font-medium text-gray-700">
                        Nombre de la Carrera
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="career_name" name="career_name" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Ej: Ingeniería en Sistemas"
                           value="{{ old('career_name', $carrera->career_name ?? '') }}"
                           required>
                </div>

                <div class="mb-4">
                    <label for="total_semesters" class="block text-sm font-medium text-gray-700">
                        Total de Semestres
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="total_semesters" name="total_semesters" min="1" max="20"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                           placeholder="Ej: 10"
                           value="{{ old('total_semesters', $carrera->total_semesters ?? '') }}"
                           required>
                </div>

                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" 
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               {{ (old('is_active', $carrera->is_active ?? true) ? 'checked' : '') }}>
                        <span class="ml-2 text-sm text-gray-600">Carrera activa</span>
                    </label>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ $submitText ?? 'Guardar Carrera' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>