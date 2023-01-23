<?php

namespace App\Http\Livewire\User;

use App\Models\Hebergement as ModelsHebergement;
use Livewire\Component;

class Hebergement extends Component
{
    public $accounts, $lieu, $prix, $editing,$h_id;
    public function render()
    {
        return view('livewire.user.hebergement');
    }

    public function mount()
    {
        $this->get_data();
    }

    public function get_data()
    {
        $data = ModelsHebergement::all()->where("user_id", Auth()->user()->id);
        $this->accounts = $data;
    }

    public function add()
    {
        $this->validate();
        ModelsHebergement::create([
            "prix_GB" => $this->prix,
            "lieu" => $this->lieu,
            "user_id" => auth()->user()->id
        ]);
        $this->clear();
    }

    public function get_one($id) {
        $one=ModelsHebergement::find($id);
        $this->prix = $one->prix_GB;
        $this->lieu = $one->lieu;
        $this->h_id = $one->id;
        $this->editing = true;
    }

    public function delete($id) {
        ModelsHebergement::find($id)->delete();
        $this->clear();
    }

    public function update() {
        $this->validate();
        $hb = ModelsHebergement::find($this->h_id);
        $hb->update([
            "prix_GB" => $this->prix,
            "lieu" => $this->lieu,
        ]);
        $this->clear();
        $this->h_id = "";
        $this->editing = false;
    }

    public function clear() {
        $this->prix = "";
        $this->editing = false;
        $this->h_id = "";
        $this->lieu = "";
    }

    public function click()
    {
        $this->get_data();
    }

    protected $rules = [
        'prix' => 'required',
        'lieu' => 'required',
    ];

    protected $messages = [
        'prix.required' => 'prix field required',
        'lieu.required' => 'lieu field required',
    ];

}
