<?php

namespace App\Http\Livewire;

use App\Models\nom_domaine;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class NomDomaine extends Component
{
    public $domains_list , $lieu , $nom , $prix ,$users_list,$editing,$user,$nom_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.nom-domaine', [
            'nom_domains_list' => nom_domaine::paginate(1),
        ]);
    }

     public function get_domaines() {
        $list = nom_domaine::latest()->get();
        $users = User::role('user')->get();
        $this->users_list = $users;
        $this->domains_list=$list;
    }

    public function mount() {
        $this->get_domaines();
    }

    public function get_one($id) {
        $name = nom_domaine::find($id);
        $this->user = $name->user->name;
        $this->prix = $name->prix;
        $this->lieu = $name->lieu;
        $this->nom = $name->nom;
        $this->nom_id = $name->id;
        $this->editing = true;
    }

    public function add_new_one() {
        $this->validate();
        nom_domaine::create([
            "prix" => $this->prix,
            "lieu" => $this->lieu,
            "nom" => $this->nom,
            "user_id" => $this->user,
        ]);
        $this->get_domaines();
        $this->cancel();
    }

    public function cancel() {
        $this->editing = false;
        $this->prix = "";
        $this->lieu = "";
        $this->nom = "";
        $this->user = "";
        $this->get_domaines();
    }

    public function update() {
        $one = nom_domaine::find($this->nom_id);
        $one->prix = $this->prix;
        $one->nom = $this->nom;
        $one->lieu = $this->lieu;
        $one->user_id = $this->user;
        $one->update();
        $this->get_domaines();
        $this->cancel();
    }

    public function delete($id) {
        nom_domaine::find($id)->delete();
        $this->get_domaines();
        $this->cancel();
    }



    protected $rules = [
        'prix' => 'required',
        'lieu' => 'required',
        'nom' => 'required',
        'user' => 'required',
    ];

    protected $messages = [
        'prix.required' => 'prix is required a sat',
        'lieu.required' => 'lieu ra required a sat',
        'nom.required' => 'lieu ra required a sat',
        'user.required' => 'user ra required a sat',
    ];
}
