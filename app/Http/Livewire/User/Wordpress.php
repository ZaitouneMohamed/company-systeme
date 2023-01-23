<?php

namespace App\Http\Livewire\User;

use App\Models\Wordpress as ModelsWordpress;
use Livewire\Component;

class Wordpress extends Component
{

    public $wordpress_list, $wp_id, $editing;
    public $email, $password, $lien;



    public function render()
    {
        return view('livewire.user.wordpress');
    }

    public function mount()
    {
        $this->get_list();
    }

    public function add()
    {
        ModelsWordpress::create([
            "email" => $this->email,
            "password" => $this->password,
            "lien" => $this->lien,
            "user_id" => auth()->user()->id
        ]);
        $this->get_list();
        $this->clear();
    }

    public function get_list()
    {
        $ll = ModelsWordpress::all()->where('user_id', auth()->user()->id);
        $this->wordpress_list = $ll;
    }

    public function delete($id)
    {
        ModelsWordpress::find($id)->delete();
        $this->get_list();
        $this->clear();
    }

    public function update()
    {
        $panel = ModelsWordpress::find($this->wp_id);
        $panel->email = $this->email;
        $panel->password = $this->password;
        $panel->lien = $this->lien;
        $panel->update();
        $this->get_list();
        $this->clear();
    }

    public function get_one($id)
    {
        $wp = ModelsWordpress::find($id);
        $this->wp_id = $wp->id;
        $this->email = $wp->email;
        $this->lien = $wp->lien;
        $this->password = $wp->password;
        $this->editing = true;
    }

    public function clear()
    {
        $this->email = "";
        $this->password = "";
        $this->lien = "";
        $this->editing = false;
    }
}
