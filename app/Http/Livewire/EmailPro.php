<?php

namespace App\Http\Livewire;

use App\Models\Email_pro;
use App\Models\User;
use Livewire\Component;

class EmailPro extends Component
{
    public $emails_list,$users_list , $email , $password , $lien , $user , $editing , $email_id ;

    public function render()
    {
        return view('livewire.email-pro');
    }

    public function mount() {
        $this->get_emails();
    }

    public function add_new_one() {
        $this->validate();
        Email_pro::create([
            "email" => $this->email,
            "lien" => $this->lien,
            "mot_de_passe" => $this->password,
            "user_id" => $this->user,
        ]);
        $this->get_emails();
        $this->clears();
    }

    public function get_one($id) {
        $emaill = Email_pro::find($id);
        $this->email_id = $emaill->id;
        $this->email = $emaill->email;
        $this->password = $emaill->mot_de_passe;
        $this->lien = $emaill->lien;
        $this->editing = true;
    }

    public function update() {
        $email = Email_pro::find($this->email_id);
        $email->email = $this->email;
        $email->mot_de_passe = $this->password;
        $email->lien = $this->lien;
        $email->update();
        $this->editing = false;
        $this->get_emails();
        $this->clears();
    }

    public function delete($id) {
        Email_pro::find($id)->delete();
        $this->get_emails();
        $this->clears();
    }

    public function clears() {
        $this->editing = false;
        $this->email = "";
        $this->lien = "";
        $this->password = "";
        $this->email_id = "";
    }

    public function get_emails() {
        $test = Email_pro::all();
        $uu = User::role('user')->get();
        $this->emails_list = $test;
        $this->users_list = $uu;
    }

    protected $rules = [
        'email' => 'required',
        'lien' => 'required',
        'password' => 'required',
        'user' => 'required',
    ];

    protected $messages = [
        'email.required' => 'email is required a sat',
        'lien.required' => 'lien ra required a sat',
        'user.required' => 'user ra required a sat',
        'password.required' => 'password ra required a sat',
    ];
}
