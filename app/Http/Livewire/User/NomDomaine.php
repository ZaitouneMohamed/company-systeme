<?php

namespace App\Http\Livewire\User;

use App\Models\nom_domaine;
use Livewire\Component;

class NomDomaine extends Component
{

    public $nom_domaines_list , $editing ;
    public $prix , $lieu , $nom , $nom_id;

    public function render()
    {
        return view('livewire.user.nom-domaine');
    }

    public function mount() {
        $this->get_list();
    }

    public function get_list() {
        $ll = nom_domaine::all()->where("user_id",auth()->user()->id);
        $this->nom_domaines_list = $ll;
    }

    public function add() {
        $this->validate();
        nom_domaine::create([
            "prix" =>$this->prix,
            "lieu" =>$this->lieu,
            "nom" =>$this->nom,
            "user_id" => auth()->user()->id
        ]);
        $this->get_list();
        $this->clear();
    }

    public function get_one($id) {
        $l = nom_domaine::find($id);
        $this->prix = $l->prix;
        $this->lieu = $l->lieu;
        $this->nom = $l->nom;
        $this->nom_id = $l->id;
        $this->editing = true;
    }

    public function clear() {
        $this->prix = "";
        $this->lieu = "";
        $this->nom = "";
        $this->nom_id = "";
        $this->editing = false;
    }

    public function update() {
        $l = nom_domaine::find($this->nom_id);
        $l->update([
            "prix" =>$this->prix,
            "lieu" =>$this->lieu,
            "nom" =>$this->nom
        ]);
        $this->get_list();
        $this->clear();
    }

    public function delete($id) {
        nom_domaine::find($id)->delete();
        $this->get_list();
        $this->clear();
    }

    protected $rules = [
        'prix' => 'required',
        'lieu' => 'required',
        'nom' => 'required',
    ];

    protected $messages = [
        'prix.required' => 'prix field required',
        'nom.required' => 'nom field required',
        'lieu.required' => 'lieu field required',
    ];
}
