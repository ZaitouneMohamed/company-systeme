<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\bon;
use App\Models\facture;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function hebergement() {
        return view('user.content.hebergement.index');
    }

    public function nom_domaines() {
        return view('user.content.nom_domaine.index');
    }

    public function email_pro() {
        return view('user.content.email_pro.index');
    }

    public function cpanel() {
        return view('user.content.cpanel.index');
    }

    public function wordpress() {
        return view('user.content.wordpress.index');
    }

    public function factures() {
        $factures = facture::all()->where('user_id',auth()->user()->id);
        $bons = bon::all()->where('user_id',auth()->user()->id);
        return view('user.content.factures.index',compact('factures','bons'));
    }
}
