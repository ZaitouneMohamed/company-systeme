<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Superadmins extends Component
{
    public $editing;
    public $name;
    public $email;
    public $password;
    public $users;
    public $user_id;


    public function mount() {
        $this->get_users();
    }

    public function render()
    {
        return view('livewire.superadmins');
    }

    public function get_users() {
        $userslist = User::role('super admin')->get();
        $this->users=$userslist;
    }

    public function get_user($id) {
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user_id = $user->id;
        $this->editing = true;
    }

    public function cancel() {
        $this->name = "";
        $this->email = "";
        $this->user_id = "";
        $this->editing = false;
    }

    public function adduser() {
        $this->validate();
        User::create([
            "name" => $this->name,
            "email" => $this->email,
            "active" => 1,
            "password" => Hash::make($this->password),
        ])->assignRole('super admin');
        $this->clearinputs();
        $this->get_users();
        session()->flash('message', 'User successfully added');
    }

    public function accepte($id) {
        $userr = User::find($id);
        $userr->active = 1;
        $userr->update();
        $this->get_users();
        $this->clearinputs();
    }

    public function disable($id) {
        $userr = User::find($id);
        $userr->active = 0;
        $userr->update();
        $this->get_users();
        $this->clearinputs();
    }

    public function update_user() {
        $this->validate();
        $userr = User::find($this->user_id);
        $userr->name = $this->name;
        $userr->email = $this->email;
        $userr->password = Hash::make($this->password);
        $userr->update();
        $this->clearinputs();
        $this->get_users();
        $this->editing = false;
        session()->flash('message', 'User updated successfully');
    }

    public function clearinputs() {
        $this->name = "";
        $this->email = "";
        $this->password = "";
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        $this->clearinputs();
        $this->get_users();
        $this->editing = false;
        session()->flash('message', 'User deleted successfully');
    }

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    protected $messages = [
        'name.required' => 'name ra required a sat',
        'name.min' => 'name min ra 6',
        'email.required' => 'email ra required a sat',
        'email.min' => 'email min ra 6',
        'password.required' => 'passwod ra required a sat',
        'password.min' => 'password min ra 6',
    ];

}
