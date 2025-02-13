<div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-3">
    @forelse ($cards as $card)
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <img src="{{ asset('storage/' . $card->imagem) }}" alt="{{ $card->nome }}" class="object-cover w-full h-48">
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $card->nome }}</h2>
                <p class="text-gray-600">{{ $card->descricao }}</p>
                <a href="{{ $card->link }}" target="_blank"
                    class="inline-block px-4 py-2 mt-4 text-white bg-green-500 rounded">
                    Ver detalhes
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Nenhum card disponível.</p>
    @endforelse
</div>
