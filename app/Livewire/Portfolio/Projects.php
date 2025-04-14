<?php

namespace App\Livewire\Portfolio;

use App\Models\Lang;
use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{
    public function render()
    {
        $langs = Lang::all();
        $cards = Project::all();

        return view('livewire.portfolio.projects', [
            'langs' => $langs,
        ], compact('cards'))->layout('layouts.app');
    }
}
