<?php

namespace App\Livewire;

use App\Models\Card;
use Livewire\Component;

class PublicCards extends Component
{
    public function render()
    {
        return view('livewire.public-cards', [
            'cards' => Card::all(), // Certifique-se de passar os dados corretamente
        ])->layout('layouts.app'); // Defina o layout correto
    }
}
