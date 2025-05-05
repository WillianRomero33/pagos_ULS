<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pagos ULS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .college-primary {
            background-color: #1a365d;
        }
        .college-secondary {
            background-color: #e2e8f0;
        }
        .college-accent {
            color: #f6ad55;
        }
    </style>
    @stack('styles') <!-- Para estilos adicionales en otras vistas -->
</head>
<body class="bg-gray-50">
    @include('components.header')
    
    <main class="container mx-auto px-4 py-8">
        @yield('content')   
    </main>

    @stack('scripts') <!-- Para scripts adicionales -->
</body>
</html>