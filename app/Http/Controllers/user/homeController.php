<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
}
