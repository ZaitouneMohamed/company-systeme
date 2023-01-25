<?php

namespace App\Http\Livewire;

use App\Models\fournisseur as ModelsFournisseur;
use Livewire\Component;

class Fournisseur extends Component
{

    public $data , $editing , $f_id;
    public $prix_HT , $prix_TTC, $m_p , $nom , $d_v , $livraison;

    public function render()
    {
        return view('livewire.fournisseur');
    }

    public function mount() {
        $this->get_data();
    }

    public function add() {
        ModelsFournisseur::create([
            "prix_HT" => $this->prix_HT,
            "prix_TTC" => $this->prix_TTC,
            "mode_payement" => $this->m_p,
            "nom" => $this->nom,
            "déja_versé" => $this->d_v,
            "livraison" => $this->livraison,
        ]);
        $this->get_data();
        // $this->cancel();
    }

    public function get_one($id) {
        $f = ModelsFournisseur::find($id);
        $this->prix_HT = $f->prix_HT;
        $this->prix_TTC = $f->prix_TTC;
        $this->m_p = $f->mode_payement;
        $this->nom = $f->nom;
        $this->d_v = $f->déja_versé;
        $this->livraison = $f->livraison;
        $this->f_id = $f->id;
        $this->editing = true;
    }

    public function update() {
        ModelsFournisseur::find($this->f_id)->update([
            "prix_HT" => $this->prix_HT,
            "prix_TTC" => $this->prix_TTC,
            "mode_payement" => $this->m_p,
            "nom" => $this->nom,
            "déja_versé" => $this->d_v,
            "livraison" => $this->livraison,
        ]);
        $this->get_data();
        $this->cancel();
    }

    public function delete($id) {
        ModelsFournisseur::find($id)->delete();
        $this->get_data();
        $this->cancel();
    }

    public function cancel() {
        $this->prix_HT = "";
        $this->prix_TTC = "";
        $this->editing = false;
        $this->f_id = "";
        $this->m_p = "";
        $this->nom = "";
        $this->d_v = "";
        $this->livraison = "";
    }

    public function get_data() {
        $data = ModelsFournisseur::all();
        $this->data = $data;
    }
}
