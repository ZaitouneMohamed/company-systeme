<?php

namespace App\Http\Livewire;

use App\Models\facture as ModelsFacture;
use App\Models\fournisseur;
use Livewire\Component;

class Facture extends Component
{

    public $data , $editing , $fournisseurs , $f_id;
    public $montant , $reste , $fournisseur , $benefice , $avance , $mode;

    public function render()
    {
        return view('livewire.facture');
    }

    public function mount() {
        $this->get_data();
    }

    public function add() {
        ModelsFacture::create([
            "montant" => $this->montant,
            "Reste" => $this->reste,
            "fournisseur_id" => $this->fournisseur,
            "benefice" => $this->benefice,
            "avance" => $this->avance,
            "mode" => $this->mode,
        ]);
        $this->get_data();
        $this->cancel();
    }

    public function get_one($id) {
        $a = ModelsFacture::find($id);
        $this->montant = $a->montant;
        $this->reste = $a->Reste;
        $this->fournisseur = $a->fournisseur_id;
        $this->benefice = $a->benefice;
        $this->avance =$a->avance ;
        $this->mode = $a->mode;
        $this->f_id= $a->id;
        $this->editing = true;
    }

    public function cancel() {
        $this->montant = "";
        $this->reste ="";
        $this->fournisseur = "";
        $this->benefice = "";
        $this->avance = "" ;
        $this->mode = "";
        $this->f_id= "";
        $this->editing = false;
    }

    public function update() {
        ModelsFacture::find($this->f_id)->update([
            "montant" => $this->montant,
            "Reste" => $this->reste,
            "fournisseur_id" => $this->fournisseur,
            "benefice" => $this->benefice,
            "avance" => $this->avance,
            "mode" => $this->mode,
        ]);
        $this->get_data();
        $this->cancel();
    }

    public function delete($id) {
        ModelsFacture::find($id)->delete();
        $this->get_data();
        $this->cancel();
    }

    public function get_data() {
        $d = ModelsFacture::all();
        $f = fournisseur::all();
        $this->data = $d;
        $this->fournisseurs = $f;
    }
}
