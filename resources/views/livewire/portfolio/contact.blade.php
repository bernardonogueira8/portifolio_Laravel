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
                                        class="flex items-center gap-1 text-white hover:underline">
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
            <div class="flex flex-1 min-h-0 overflow-y-auto">
                <!-- Editor Section -->
                <section class="w-1/2 p-6 border-r border-gray-800">
                    <div class="flex flex-col items-center leading-snug text-center text-gray-300 justify-centertext-sm ">
                        {{-- <h2 class="text-3xl font-bold">Obrigado! 🤘</h2>
                        <p class="text-gray-400">Sua mensagem foi aceita. Você receberá uma resposta em breve!</p>
                        <button wire:click="$set('sent', false)"
                            class="px-4 py-2 mt-4 bg-gray-700 rounded-xl">envie-nova-mensagem</button> --}}

                        <form wire:submit="save">
                            <input type="text" wire:model="name">

                            <input type="text" wire:model="message">

                            <button type="submit">Save</button>
                        </form>



                        {{-- <div>
                            <form wire:submit.prevent="send" class="w-full max-w-md space-y-4">
                                <div>
                                    <label class="block text-sm">_name:</label>
                                    <input wire:model="name" type="text"
                                        class="w-full p-2 bg-gray-900 border border-gray-700 rounded">
                                    @error('name')
                                        <span class="text-sm text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm">_email:</label>
                                    <input wire:model="email" type="email"
                                        class="w-full p-2 bg-gray-900 border border-gray-700 rounded">
                                    @error('email')
                                        <span class="text-sm text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm">_message:</label>
                                    <textarea wire:model="message" class="w-full p-2 bg-gray-900 border border-gray-700 rounded" rows="4"></textarea>
                                    @error('message')
                                        <span class="text-sm text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="px-4 py-2 bg-gray-800 rounded hover:bg-gray-700">submit-message</button>
                            </form>
                        </div> --}}


                    </div>
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
