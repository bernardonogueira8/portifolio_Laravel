@php
    $user = \App\Models\User::first();
@endphp

<nav x-data="{ open: false }" class="px-8 py-4 text-sm border-b border-gray-700 bg-[#0f111a]">
    <div class="flex items-center justify-between">
        <!-- Logo ou nome -->
        <div class="text-gray-400 hover:text-white">
            <a href="{{ route('portfolio.home') }}">{{ $user->username }}</a>
        </div>

        <!-- Botão do menu mobile -->
        <button @click="open = !open" class="text-gray-400 hover:text-white lg:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Menu Desktop -->
        <div class="hidden space-x-4 lg:flex">
            @foreach ([
        'portfolio.home' => '_hello-word',
        'portfolio.projects' => '_projetos',
        'portfolio.about' => '_sobre-mim',
        'portfolio.contact' => '_fale-comigo',
    ] as $route => $label)
                <a href="{{ route($route) }}"
                    class="{{ Route::is($route) ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : 'text-gray-400 hover:text-white' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Menu Mobile -->
    <div x-show="open" class="mt-4 space-y-2 lg:hidden">
        @foreach ([
        'portfolio.home' => '_hello-word',
        'portfolio.projects' => '_projetos',
        'portfolio.about' => '_sobre-mim',
        'portfolio.contact' => '_fale-comigo',
    ] as $route => $label)
            <a href="{{ route($route) }}"
                class="block {{ Route::is($route) ? 'text-orange-400' : 'text-gray-400 hover:text-white' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>
</nav>
