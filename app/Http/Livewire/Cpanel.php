<?php

namespace App\Http\Livewire;

use App\Models\Cpanel as ModelsCpanel;
use App\Models\User;
use Livewire\Component;

class Cpanel extends Component
{

    public $email , $pass_email , $password , $link ,$user, $editing , $panel_list ,$users , $panel_id;

    public function render()
    {
        return view('livewire.cpanel');
    }

    public function clears() {
        $this->editing = false;
        $this->email = "";
        $this->pass_email = "";
        $this->password = "";
        $this->link = "";
        $this->user = "";
        $this->get_list();
    }

    public function update() {
        // $this->validate();
        $panel = ModelsCpanel::find($this->panel_id);
        $panel->email = $this->email;
        $panel->mot_passe_email = $this->pass_email;
        $panel->mot_de_passe = $this->password;
        $panel->cpanel_link = $this->link;
        $panel->user_id = $this->user;
        $panel->update();
        $this->get_list();
        $this->clears();
    }

    public function get_one($id) {
        $hebergement = ModelsCpanel::find($id);
        $this->panel_id = $hebergement->id;
        $this->user = $hebergement->user->name;
        $this->email = $hebergement->email;
        $this->pass_email = $hebergement->mot_passe_email;
        $this->password = $hebergement->mot_de_passe;
        $this->pass_email = $hebergement->mot_passe_email;
        $this->link = $hebergement->cpanel_link;
        $this->editing = true;
    }

    public function mount() {
        $this->get_list();
    }

    public function get_list() {
        $list = ModelsCpanel::all();
        $users = User::role('user')->get();
        $this->panel_list = $list;
        $this->users = $users;
    }

    public function add_new_one() {
        // $this->validate();
        ModelsCpanel::create([
            "email" => $this->email,
            "mot_passe_email" => $this->pass_email,
            "mot_de_passe" => $this->password,
            "cpanel_link" => $this->link,
            "user_id" => $this->user
        ]);
        $this->get_list();
        $this->clears();
    }


    public function delete($id) {
        ModelsCpanel::find($id)->delete();
        $this->get_list();
        $this->clears();
    }

    

    

    // protected $rules = [
    //     'prix' => 'required',
    //     'lieu' => 'required',
    //     'user' => 'required',
    // ];

    // protected $messages = [
    //     'prix.required' => 'prix is required a sat',
    //     'lieu.required' => 'lieu ra required a sat',
    //     'user.required' => 'user ra required a sat',
    // ];

}
