<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BernardoNogueira8' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>


<body class="bg-[#0f111a] text-white font-mono relative">
    {{-- Conteúdo dinâmico --}}
    @yield('content')
    @yield('scripts')
    @livewireScripts
</body>

</html>
