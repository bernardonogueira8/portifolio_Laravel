<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.portfolio.about')->layout('layouts.app');
    }
}
