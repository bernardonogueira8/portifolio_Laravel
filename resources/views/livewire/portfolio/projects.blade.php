@extends('layouts.app')
@php
    $user = \App\Models\User::first();
@endphp
@section('content')
    <div class="relative h-screen overflow-hidden font-mono text-white bg-[#0f111a]">

        @include('components.navbar')
        <div x-data="{ tab: 'bio' }" class="flex h-full text-sm text-gray-300 bg-[#0f111a] font-mono">
            <!-- Sidebar -->
            <aside class="w-full md:w-64 bg-[#0f111a] text-white border-r border-gray-700 p-4 flex flex-col gap-4 text-sm">

                <div x-data="{ open: true }">
                    <button @click="open = !open" class="flex items-center justify-between w-full font-semibold text-left">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v13h18V7H3zm0-4h18v4H3V3z" />
                            </svg>
                            projetos
                        </div>
                        <span x-text="open ? '▼' : '►'" class="text-xs"></span>
                    </button>
                    <ul x-show="open" class="mt-2 ml-4 space-y-1">
                        @foreach ($langs as $lang)
                            <label class="flex items-center gap-2 text-sm text-white cursor-pointer">
                                <input type="checkbox" name="languages[]" value="{{ $lang->id }}"
                                    class="bg-gray-900 border-gray-700 rounded-sm form-checkbox accent-blue-500">
                                {{ $lang->name }}
                            </label>
                        @endforeach


                    </ul>
                </div>
            </aside>
            <main class="flex flex-col flex-1 overflow-hidden">
                <!-- Tabs -->
                <div class="flex items-center border-b border-gray-800 text-gray-400 bg-[#161925] px-4 py-2">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs">projects-info</span>
                        <div class="w-1 h-4 bg-orange-400 rounded-sm"></div>
                    </div>
                </div>
                <!-- Main Content -->
                <main class="flex-1 p-8 overflow-y-auto">
                    <!-- Grid de Cards -->
                    <div
                        class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4">
                        <!-- Card Projeto -->
                        @foreach (range(1, 10) as $i)
                            <div
                                class="bg-[#131a2b] border border-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                                <div class="relative">
                                    <img src="https://via.placeholder.com/600x300" class="object-cover w-full h-40"
                                        alt="Project {{ $i }}">
                                    <span class="absolute px-2 py-1 text-xs text-black rounded top-2 right-2 bg-cyan-100">
                                        @if ($i === 1 || $i === 2)
                                            <i class="fab fa-react"></i> React
                                        @else
                                            Vue
                                        @endif
                                    </span>
                                </div>
                                <div class="p-4 space-y-2">
                                    <h3 class="text-sm font-semibold text-blue-400">Project {{ $i }} //
                                        _nome-do-projeto</h3>
                                    <p class="text-sm text-gray-300">Duis aute irure dolor in velit esse cillum dolore.</p>
                                    <button
                                        class="inline-block px-3 py-1 mt-2 text-xs text-white transition bg-gray-800 border border-gray-600 rounded hover:bg-gray-700">
                                        view-project
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </main>
        </div>
        @include('components.footer')
    </div>
@endsection('content')
