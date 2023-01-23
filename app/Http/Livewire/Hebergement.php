<?php

namespace App\Http\Livewire;

use App\Models\Hebergement as ModelsHebergement;
use App\Models\User;
use Livewire\Component;

class Hebergement extends Component
{
    public $editing , $prix ,$user, $lieu , $hebergement_list , $users_list , $hb_id;

    public function render()
    {
        return view('livewire.hebergement');
    }

    public function mount() {
        $this->get_list();
    }

    public function get_list() {
        $hebergements = ModelsHebergement::all();
        $users = User::role('user')->get();
        $this->hebergement_list = $hebergements;
        $this->users_list = $users;
    }

    public function add_new_one() {
        $this->validate();
        ModelsHebergement::create([
            "prix_GB" => $this->prix,
            "lieu" => $this->lieu,
            "user_id" => $this->user
        ]);
        $this->get_list();
        $this->clears();
    }


    public function delete($id) {
        ModelsHebergement::find($id)->delete();
        $this->get_list();
        $this->clears();
    }

    public function update() {
        $this->validate();
        $hb=ModelsHebergement::find($this->hb_id);
        $hb->prix_GB = $this->prix;
        $hb->lieu = $this->lieu;
        $hb->user_id = $this->user;
        $hb->update();
        $this->get_list();
        $this->clears();
    }

    public function get_one($id) {
        $hebergement = ModelsHebergement::find($id);
        $this->user = $hebergement->user->name;
        $this->prix = $hebergement->prix_GB;
        $this->lieu = $hebergement->lieu;
        $this->hb_id = $hebergement->id;
        $this->editing = true;
    }

    public function clears() {
        $this->editing = false;
        $this->prix = "";
        $this->lieu = "";
        $this->user = "";
        $this->get_list();
    }

    protected $rules = [
        'prix' => 'required',
        'lieu' => 'required',
        'user' => 'required',
    ];

    protected $messages = [
        'prix.required' => 'prix is required a sat',
        'lieu.required' => 'lieu ra required a sat',
        'user.required' => 'user ra required a sat',
    ];
}
