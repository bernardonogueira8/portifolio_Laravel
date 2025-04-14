<?php

namespace App\Livewire;

use App\Models\Lang;
use App\Models\Project;
use Livewire\Component;

class ProjectList extends Component
{
    public array $selectedLanguages = [];

    // Método para detectar quando as linguagens selecionadas mudam
    public function updatedSelectedLanguages()
    {
        $this->filterProjects();
    }

    // Método de filtragem dos projetos
    public function filterProjects()
    {
        $this->projects = Project::whereHas('languages', function ($query) {
            $query->whereIn('langs.id', $this->selectedLanguages); // Correção para o nome correto da variável
        })->get();
    }

    public function render()
    {
        // Carregar todas as linguagens disponíveis
        $langs = Lang::all();

        // Filtrar projetos com base nas linguagens selecionadas
        $cards = Project::query()
            ->when($this->selectedLanguages, function ($query) {
                $query->whereHas('languages', function ($q) {
                    $q->whereIn('langs.id', $this->selectedLanguages); // Correção para o nome correto da tabela
                });
            })
            ->get();

        return view('livewire.project-list', compact('cards', 'langs'));
    }
}
