<?php

namespace App\Livewire\Portfolio;

use App\Models\Lang;
use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        $langs = Lang::all();

        return view('livewire.portfolio.projects', [
            'langs' => $langs,
        ])->layout('layouts.app');
    }
}
