<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.portfolio.home')
            ->layout('layouts.app');
    }
}
