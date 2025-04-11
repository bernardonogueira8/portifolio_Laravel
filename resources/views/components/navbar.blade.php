@php
    $user = \App\Models\User::first();
@endphp
<nav class="px-8 py-4 text-sm border-b border-gray-700 bg-[#0f111a]">
    <div class="flex items-center justify-between">
        <!-- Logo ou nome -->
        <div class="text-gray-400 hover:text-white">
            <a href="{{ route('portfolio.home') }}">{{ $user->username }}</a>
        </div>

        <!-- Links do menu -->
        <div id="menu" class="hidden space-x-4 lg:flex">
            <a href="{{ route('portfolio.home') }}"
                class="{{ Route::is('portfolio.home') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : 'text-gray-400 hover:text-white' }}">
                _hello-word
            </a>
            <a href="{{ route('portfolio.projects') }}"
                class="{{ Route::is('portfolio.projects') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : 'text-gray-400 hover:text-white' }}">
                _projetos
            </a>
            <a href="{{ route('portfolio.about') }}"
                class="{{ Route::is('portfolio.about') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : 'text-gray-400 hover:text-white' }}">
                _sobre-mim
            </a>
            <a href="{{ route('portfolio.contact') }}"
                class="{{ Route::is('portfolio.contact') ? 'text-orange-400 border-b-2 border-orange-400 pb-1' : 'text-gray-400 hover:text-white' }}">
                _fale-comigo
            </a>
        </div>

        <!-- Menu mobile -->
        <div id="menu-mobile" class="hidden mt-4 space-y-2 text-sm lg:hidden">
            <a href="{{ route('portfolio.home') }}"
                class="block {{ Route::is('portfolio.home') ? 'text-orange-400' : 'text-gray-400 hover:text-white' }}">
                _hello-word
            </a>
            <a href="{{ route('portfolio.projects') }}"
                class="block {{ Route::is('portfolio.projects') ? 'text-orange-400' : 'text-gray-400 hover:text-white' }}">
                _projetos
            </a>
            <a href="{{ route('portfolio.about') }}"
                class="block {{ Route::is('portfolio.about') ? 'text-orange-400' : 'text-gray-400 hover:text-white' }}">
                _sobre-mim
            </a>
            <a href="{{ route('portfolio.contact') }}"
                class="block {{ Route::is('portfolio.contact') ? 'text-orange-400' : 'text-gray-400 hover:text-white' }}">
                _fale-comigo
            </a>
        </div>

</nav>
