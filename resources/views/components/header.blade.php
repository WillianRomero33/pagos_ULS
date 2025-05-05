<header class="college-primary text-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="/src/ULS.png" alt="College Logo" class="h-12">
            <div>
                <h1 class="text-xl font-bold">SISTEMA DE PAGOS ULS</h1>
                <p class="text-sm text-gray-300">Universidad Luterana Salvadoreña</p>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <span class="font-medium">Bienvenido, {{ $userName ?? 'Admin' }}</span>
            <button class="hover:text-gray-300 p-2 rounded-full bg-blue-800">
                <i class="fas fa-user-circle text-xl"></i>
            </button>
        </div>
    </div>
</header>