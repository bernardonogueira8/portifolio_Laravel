<div>
    @if ($sent)
        <div class="flex flex-col items-center justify-center h-full text-sm text-gray-300">
            <h2 class="text-3xl font-bold">Obrigado! 🤘</h2>
            <p class="text-gray-400">Sua mensagem foi aceita. Você receberá uma resposta em breve!</p>
            <button wire:click="$set('sent', false)" class="px-4 py-2 mt-4 bg-gray-700 rounded-xl">
                envie-nova-mensagem
            </button>
        </div>
    @else
        <form wire:submit.prevent="create" class="space-y-4">
            {{ $this->form }}
            <button type="submit" class="px-4 py-2 bg-gray-800 rounded hover:bg-gray-700">
                enviar-mensagem
            </button>
        </form>
    @endif
</div>
