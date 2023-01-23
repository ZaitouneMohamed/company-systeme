<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Wordpress as ModelsWordpress;
use Livewire\Component;

class Wordpress extends Component
{
    public $email , $password , $lien , $user , $editing , $wordpress_list , $wp_id , $users;
    public function render()
    {
        return view('livewire.wordpress');
    }
    public function get_list() {
        $list = ModelsWordpress::all();
        $users = User::role('user')->get();
        $this->wordpress_list = $list;
        $this->users = $users;
    }

    public function add_new_one() {
        // $this->validate();
        ModelsWordpress::create([
            "email" => $this->email,
            "password" => $this->password,
            "lien" => $this->lien,
            "user_id" => $this->user
        ]);
        $this->get_list();
        $this->clears();
    }


    public function delete($id) {
        ModelsWordpress::find($id)->delete();
        $this->get_list();
        $this->clears();
    }

    public function get_one($id) {
        $wp = ModelsWordpress::find($id);
        $this->wp_id = $wp->id;
        $this->user = $wp->user->name;
        $this->email = $wp->email;
        $this->lien = $wp->lien;
        $this->password = $wp->password;
        $this->editing = true;
    }

    public function clears() {
        $this->editing = false;
        $this->email = "";
        $this->lien = "";
        $this->password = "";
        $this->get_list();
    }

    public function update() {
        $panel = ModelsWordpress::find($this->wp_id);
        $panel->email = $this->email;
        $panel->password = $this->password;
        $panel->lien = $this->lien;
        $panel->user_id = $this->user;
        $panel->update();
        $this->get_list();
        $this->clears();
    }



    public function mount() {
        $this->get_list();
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
