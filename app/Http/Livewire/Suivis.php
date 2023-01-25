<?php

namespace App\Http\Livewire;

use App\Models\bon;
use App\Models\facture;
use App\Models\suivi;
use Livewire\Component;

class Suivis extends Component
{

    public $data , $suivi_id;
    public $service , $activite , $nom_societe , $secteur , $categorie , $besoin,$editing;

    public function render()
    {
        return view('livewire.suivis');
    }

    public function get_one($id) {
        $s = suivi::find($id);
        $this->suivi_id = $s->id;
        $this->service=$s->service;
        $this->activite=$s->activite;
        $this->nom_societe=$s->nom_societe;
        $this->secteur=$s->Secteur;
        $this->categorie=$s->categorie;
        $this->besoin=$s->besoin;
        $this->editing = true;
    }

    public function mount()
    {
        $this->get_list();
    }

    public function update() {
        $s = suivi::find($this->suivi_id);
        $s->update([
            'service' => $this->service,
            'activite'=>$this->activite,
            'nom_societe'=>$this->nom_societe,
            'Secteur'=>$this->secteur,
            'categorie'=>$this->categorie,
            'besoin'=>$this->besoin
        ]);
        $this->get_list();
        $this->cancel();
    }

    public function cancel() {
        $this->editing = false;
        $this->suivi_id = "";
        $this->service="";
        $this->activite="";
        $this->nom_societe="";
        $this->secteur="";
        $this->categorie="";
        $this->besoin="";
        $this->get_list();
    }

    public function add() {
        suivi::create([
            'service' => $this->service,
            'activite'=>$this->activite,
            'nom_societe'=>$this->nom_societe,
            'Secteur'=>$this->secteur,
            'categorie'=>$this->categorie,
            'besoin'=>$this->besoin
        ]);
        $this->get_list();
        $this->cancel();
    }

    public function delete_bon($id) {
        suivi::find($id)->update([
            "bon_id" => null
        ]);
        bon::where('suivi_id',$id)->update([
            "suivi_id" => null
        ]);
        $this->get_list();
    }

    public function delete_facture($id) {
        suivi::find($id)->update([
            "facture_id" => null
        ]);
        facture::where('suivi_id',$id)->update([
            "suivi_id" => null
        ]);
        $this->get_list();
    }

    public function get_list()
    {
        $d = suivi::all();
        $this->data = $d;
    }

    public function delete($id) {
        $s=suivi::find($id);
        if ($s->facture_id) {
            facture::where('suivi_id',$id)->update([
                "suivi_id" => null
            ]);
        }
        if ($s->bon_id) {
            bon::where('suivi_id',$id)->update([
                "suivi_id" => null
            ]);
        }
        $s->delete();
        $this->get_list();
    }
}
