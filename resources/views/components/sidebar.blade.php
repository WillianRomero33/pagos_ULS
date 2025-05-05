<aside class="w-64 h-screen bg-white shadow-md border-r hidden md:block">
    <div class="p-4">
        <h2 class="text-xl font-bold text-blue-900 mb-6">Navegacion</h2>
        <nav class="space-y-2">
            <a href="{{ route('students.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 rounded">
                Estudiantes
            </a>
            <a href="{{ route('careers.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 rounded">
                Carreras
            </a>
            <a href="{{ route('semesters.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 rounded">
                Semestres
            </a>
            <a href="{{ route('fees.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 rounded">
                Cargos
            </a>
        </nav>
    </div>
</aside>
