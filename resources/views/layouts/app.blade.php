<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Meu App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100">
    <div class="container p-6 mx-auto">
        {{ $slot }} {{-- Onde o conteúdo do Livewire será renderizado --}}
    </div>
    @livewireScripts
</body>

</html>
