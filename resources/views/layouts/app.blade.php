<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENUSA - Branded Bags</title>
    
    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    
    <!-- Main Content -->
    <main class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        {{ $slot }}
    </main>

    <!-- Scripts -->
    @livewireScripts
</body>
</html> 