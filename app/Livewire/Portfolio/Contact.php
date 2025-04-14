<?php

namespace App\Livewire\Portfolio;

use App\Livewire\Forms\ContactMessage;
use Livewire\Component;

class Contact extends Component
{

    public function render()
    {
        return view('livewire.portfolio.contact')->layout('layouts.app', ['title' => 'Contato']);
    }
}
