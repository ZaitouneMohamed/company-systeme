<?php

namespace App\Http\Livewire;

use App\Models\suivi;
use Livewire\Component;

class Suivis extends Component
{

    public $data;
    public $service , $activite , $nom_societe , $secteur , $categorie , $besoin,$editing;

    public function render()
    {
        return view('livewire.suivis');
    }

    public function mount()
    {
        $this->get_list();
    }

    public function add() {
        suivi::create([
            'service' => $this->service,
            'activite'=>$this->activite,
            'nom_societe'=>$this->nom_societe,
            'Secteur'=>$this->secteur,
            'categorie'=>$this->categorie,
            'besoin'=>$this->besoin
        ]);
        $this->get_list();
    }

    public function get_list()
    {
        $d = suivi::all();
        $this->data = $d;
    }
}
