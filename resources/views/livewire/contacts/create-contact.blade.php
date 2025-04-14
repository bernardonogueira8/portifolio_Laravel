<main class="flex flex-col flex-1 overflow-hidden">
    <!-- Tabs -->
    <div class="flex items-center border-b border-gray-800 text-gray-400 bg-[#161925] px-4 py-2">
        <div class="flex items-center space-x-2">
            <span class="text-xs">entre-em-contato</span>
            <div class="w-1 h-4 bg-orange-400 rounded-sm"></div>
        </div>
    </div>
    <div class="flex flex-1 min-h-0 overflow-y-auto">

        <!-- Editor Section -->
        <section class="w-1/2 p-6 border-r border-gray-800">
            @if ($sent)
                <div class="flex flex-col items-center justify-center w-full p-4 pt-16 text-center ">
                    <h2 class="text-3xl font-bold text-white">Obrigado! 🤘</h2>
                    <p class="mt-2 text-gray-400">Sua mensagem foi aceita. Você receberá uma resposta em breve!</p>
                    <button wire:click="$set('sent', false)"
                        class="px-4 py-2 mt-4 transition duration-300 bg-gray-700 rounded-xl hover:bg-gray-600">
                        Enviar nova mensagem
                    </button>
                </div>
            @else
                <form wire:submit.prevent="create" class="w-full p-6 pt-16 space-y-4">
                    {{ $this->form }}
                    <button type="submit"
                        class="px-4 py-2 transition duration-300 bg-gray-800 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600">
                        Enviar mensagem
                    </button>
                </form>
            @endif
        </section>
        <section class="visible w-1/2 p-2 pt-16 border-r border-gray-800">
            <pre class="text-sm leading-relaxed text-gray-400 whitespace-pre-wrap">
                    <code class="block">
                    <span class="text-blue-400">const</span> button = <span class="text-yellow-400">document.querySelector</span>(<span class="text-red-400">'#sendBtn'</span>);

                    <span class="text-blue-400">const</span> message = {
                        name: <span class="text-teal-400">"{{ $data['name'] ?? '' }}"</span>,
                        email: <span class="text-teal-400">"{{ $data['email'] ?? '' }}"</span>,
                        message: <span class="text-teal-400">"{{ $data['message'] ?? '' }}"</span>,
                        date: <span class="text-teal-400">"{{ now() }}"</span>
                    }

                    button.addEventListener(<span class="text-orange-400">'click'</span>, () => {
                        form.send(message);
                    })
                    </code>
            </pre>
        </section>

    </div>
</main>
