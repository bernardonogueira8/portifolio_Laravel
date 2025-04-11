@extends('layouts.app')
@php
    $user = \App\Models\User::first();
@endphp
@section('content')
    <div class="relative min-h-screen overflow-hidden font-mono text-white bg-[#011627]">
        @include('components.navbar')
        <div x-data="{ tab: 'bio' }" class="flex min-h-[80vh] text-sm text-gray-300 bg-[#0f111a] font-mono">
            <!-- Sidebar -->
            <aside class="w-full md:w-64 bg-[#011627] text-white border-r border-gray-700 p-4 flex flex-col gap-4 text-sm">

                <!-- Contacts -->
                <div>
                    <p class="mb-2 font-semibold text-gray-400">Contato</p>
                    <ul class="mx-2">
                        <li class="flex items-center gap-2 text-gray-200">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 4H8a4 4 0 00-4 4v8a4 4 0 004 4h8a4 4 0 004-4V8a4 4 0 00-4-4zM8 8h8"></path>
                            </svg>
                            {{ $user->email }}
                        </li>

                    </ul>
                </div>
                <!-- Encontre-me -->
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="flex items-center justify-between w-full font-semibold text-left">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v13h18V7H3zm0-4h18v4H3V3z" />
                            </svg>
                            Outras redes sociais:
                        </div>
                        <span x-text="open ? '▼' : '►'" class="text-xs"></span>
                    </button>
                    <ul x-show="open" class="mt-2 ml-4 space-y-1">
                        @php
                            $social = $user->social_media ?? [];
                        @endphp

                        @foreach ($social as $key => $link)
                            @if (!empty($link))
                                <li>
                                    <a href="{{ $link }}" target="_blank" rel="noopener"
                                        class="flex items-center gap-1 text-green-300 hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 3h7m0 0v7m0-7L10 14" />
                                        </svg>
                                        {{ ucfirst($key) }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </div>

            </aside>




        </div>
    </div>


    @include('components.footer')
    </div>
@endsection('content')
