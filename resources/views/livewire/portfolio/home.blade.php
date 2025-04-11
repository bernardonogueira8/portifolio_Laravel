@extends('layouts.app')

@section('content')
    @php
        $user = \App\Models\User::first(); // ou Auth::user()
    @endphp
    <div class="relative min-h-screen overflow-hidden font-mono text-white">
        @include('components.navbar')
        {{-- Content --}}
        <div class="min-h-[80vh] flex flex-col lg:flex-row items-center justify-center  text-white">

            {{-- Bloco da esquerda (apresentação) --}}
            <div class="flex justify-center mx-auto md:mx-5">
                <div class="max-w-md">
                    <p class="mb-2 text-gray-300">// Hello Word. Eu sou</p>
                    <h1 class="mb-2 text-5xl font-bold tracking-wide text-white">{{ $user->name }}</h1>
                    <p class="text-xl font-medium text-blue-400">&gt; {{ $user->subtitle }}</p>
                    <div class="mt-8 space-y-1 text-sm text-gray-400">
                        <p>// {{ $user->resume }}</p>
                        <p>// Minha página do Github</p>
                        <p>
                            <span class="text-green-400">const</span>
                            <span class="text-blue-300">githubLink</span> =
                            <span class="text-orange-400">"{{ $user->social_media['github'] ?? '' }}"</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Bloco da direita (componente do jogo) --}}
            <div class="flex justify-center pt-6 mx-5 lg:pt-1">
                {{-- Lado direito: jogo importado como componente --}}
                @include('components.game')
            </div>

        </div>
        @include('components.footer')
        @include('components.background')
    </div>
@endsection
