<?php

namespace App\Livewire\Portfolio;

use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        return view('livewire.portfolio.projects')->layout('layouts.app');
    }
}
