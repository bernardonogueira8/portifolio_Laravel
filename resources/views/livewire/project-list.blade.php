<div class="flex h-full text-sm text-gray-300 bg-[#0f111a] font-mono">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-[#0f111a] text-white border-r border-gray-700 p-4 flex flex-col gap-4 text-sm">
        <div x-data="{ open: true }">
            <button @click="open = !open" class="flex items-center justify-between w-full font-semibold text-left">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
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
                        <input type="checkbox" wire:model="selectedLangs" value="{{ $lang->id }}"
                            class="form-checkbox accent-blue-500">
                        {{ $lang->name }}
                    </label>
                @endforeach

            </ul>
        </div>
    </aside>

    <!-- Cards -->
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4">
            @forelse ($cards as $card)
                <div
                    class="bg-[#131a2b] border border-gray-700 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition">
                    <div class="relative">
                        <img src="{{ $card->image_path }}" class="object-cover w-full h-40" alt="Project">
                        <span class="absolute px-2 py-1 text-xs text-black rounded top-2 right-2 bg-cyan-100">
                            {{ $card->type }}
                        </span>
                    </div>
                    <div class="p-4 space-y-2">
                        <h3 class="text-sm font-semibold text-blue-400">Projeto // _{{ $card->name }}</h3>
                        <p class="text-sm text-gray-300">{{ $card->description }}</p>
                        <a href="{{ $card->url }}"
                            class="inline-block px-3 py-1 mt-2 text-xs text-white transition bg-gray-800 border border-gray-600 rounded hover:bg-gray-700">
                            ver-projeto
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-white col-span-full">Nenhum projeto encontrado com os filtros selecionados.</div>
            @endforelse
        </div>
    </main>
</div>
