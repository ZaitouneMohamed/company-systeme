<?php

namespace App\Http\Livewire\User;

use App\Models\Email_pro;
use Livewire\Component;

class EmailPro extends Component
{
    public $emails_list;
    public $email , $lien , $password , $editing , $e_id;

    public function render()
    {
        return view('livewire.user.email-pro');
    }

    public function mount() {
        $this->get_list();
    }

    public function get_list() {
        $ll = Email_pro::all()->where('user_id',auth()->user()->id);
        $this->emails_list = $ll;
    }

    public function add() {
        $this->validate();
        Email_pro::create([
            "email" => $this->email,
            "lien" => $this->lien,
            "mot_de_passe" => $this->password,
            "user_id" => auth()->user()->id
        ]);
        $this->get_list();
        $this->clear();
        $this->editing = false;
    }

    public function delete($id) {
        Email_pro::find($id)->delete();
        $this->get_list();
        $this->clear();
        $this->editing = false;
    }

    public function update() {
        $this->validate();
        $on = Email_pro::find($this->e_id);
        $on->update([
            "email" => $this->email,
            "lien" => $this->lien,
            "mot_de_passe" => $this->password,
        ]);
        $this->get_list();
        $this->clear();
        $this->editing = false;
    }

    public function get_one($id) {
        $one = Email_pro::find($id);
        $this->email = $one->email;
        $this->lien = $one->lien;
        $this->password = $one->mot_de_passe;
        $this->e_id = $one->id;
        $this->editing = true;
    }

    public function clear() {
        $this->email = "";
        $this->lien = "";
        $this->password = "";
        $this->e_id = "";
        $this->editing = false;
    }

    protected $rules = [
        'email' => 'required',
        'lien' => 'required',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'email field required',
        'lien.required' => 'lien field required',
        'password.required' => 'password field required',
    ];
}
