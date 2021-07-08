<?php

namespace App\Http\Livewire;

use App\Models\npcdef;
use Livewire\Component;
use Livewire\WithPagination;

class NpcSearch extends Component
{
    use WithPagination;

    public string $searchTerm = 'Type a name';
    public string $npcdefs;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.npc-search', [
            'npcResults' => npcdef::where('name', 'like', $searchTerm)->orderBy('combatlvl', 'asc')->paginate(6)
        ]);
    }
}
