<?php

namespace App\Http\Livewire;

use App\Models\fournisseur as ModelsFournisseur;
use Livewire\Component;

class Fournisseur extends Component
{

    public $data;

    public function render()
    {
        return view('livewire.fournisseur');
    }

    public function mount() {
        $this->get_data();
    }

    public function get_data() {
        $data = ModelsFournisseur::all();
        $this->data = $data;
    }
}
