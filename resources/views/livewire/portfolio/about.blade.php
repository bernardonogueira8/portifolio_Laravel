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
                            informações-pessoais
                        </div>
                        <span x-text="open ? '▼' : '►'" class="text-xs"></span>
                    </button>
                    <ul x-show="open" class="mt-2 ml-4 space-y-1">
                        <li class="flex items-center gap-1 text-green-300"><span>📄</span> bio</li>
                        <li class="flex items-center gap-1 text-indigo-400"><span>📘</span> interesses</li>
                        <li class="flex items-center gap-1 text-indigo-300"><span>🎓</span> educação</li>
                    </ul>
                </div>

                <!-- contacts -->
                <div>
                    <p class="mb-2 font-semibold text-gray-400 ">contato</p>
                    <ul class="ml-2 space-y-1">
                        <li class="flex items-center gap-2 text-gray-200">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M16 4H8a4 4 0 00-4 4v8a4 4 0 004 4h8a4 4 0 004-4V8a4 4 0 00-4-4zM8 8h8"></path>
                            </svg>
                            {{ $user->email }}
                        </li>

                    </ul>
                </div>
            </aside>
            <main class="flex flex-col flex-1 overflow-hidden">
                <!-- Tabs -->
                <div class="flex items-center border-b border-gray-800 text-gray-400 bg-[#161925] px-4 py-2">
                    <div class="flex items-center space-x-2">
                        <span class="text-xs">personal-info</span>
                        <div class="w-1 h-4 bg-orange-400 rounded-sm"></div>
                    </div>
                </div>
                <div class="flex flex-1 min-h-0 overflow-y-auto">
                    <!-- Editor Section -->
                    <section class="w-1/2 p-6 border-r border-gray-800">
                        <pre class="text-sm leading-snug text-gray-300 whitespace-pre-wrap">{{ $user->bio }}
                        </pre>
                    </section>
                    <section class="w-1/2 p-6 border-r border-gray-800">
                        <pre class="text-sm leading-snug text-gray-300 whitespace-pre-wrap">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, harum tempora. Voluptatem, odit doloremque delectus libero sint sequi, possimus est temporibus aut aliquam nemo ipsam. Cumque iure omnis quos. Excepturi.
                    </pre>
                    </section>

                </div>
        </div>
        @include('components.footer')
    </div>
@endsection('content')
