<?php

namespace App\Http\Controllers\Sadmin;

use App\Models\bon;
use App\Models\User;
use App\Models\suivi;
use App\Models\facture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class homeController extends Controller
{
    public function index()
    {
        return view('sadmin.content.home');
    }

    public function assign_role(Request $request, $id)
    {
        $role = Role::find($id);
        if ($role->hasPermissionTo($request->permission)) {
            return redirect()->back()->with('message', 'permission already exist');
        }
        $role->givePermissionTo($request->permission);
        return redirect()->back()->with('message', 'permission added');
    }

    public function remove_role(Request $request)
    {
        $permission = Permission::find($request->permission_name);
        $permission->removeRole($request->role_name);
        return redirect()->back()->with('message', 'permission removed');
    }

    public function remove_role_from_user(Request $request,$id) {
        User::find($id)->removeRole($request->role_name);
        return redirect()->back();
    }

    public function admins_list()
    {
        return view('sadmin.content.users.admins');
    }

    public function super_admins_list()
    {
        return view('sadmin.content.users.superadmins');
    }

    public function users_list() {
        return view('sadmin.content.users.users.users');
    }

    public function hebergement() {
        return view("sadmin.content.hebergement.index");
    }

    public function nom_domain() {
        return view("sadmin.content.nom_domain.index");
    }

    public function emailPro() {
        return view('sadmin.content.emailPro.index');
    }

    public function cpanel() {
        return view("sadmin.content.Cpanel.index");
    }

    public function wordpress() {
        return view("sadmin.content.wordpress.index");
    }

    public function fournisseur() {
        return view('sadmin.content.fournisseur.index');
    }

    public function facture() {
        return view('sadmin.content.facture.index');
    }

    public function bon() {
        return view('sadmin.content.bon.index');
    }

    public function suivis() {
        return view('sadmin.content.suivis.index');
    }

    public function facture_list_to_take($id) {
        $data = facture::all()->where('suivi_id',null);
        $suivi = suivi::find($id);
        return view('sadmin.content.facture.untacked',compact('data','suivi'));
    }

    public function add_facture_to_suivis($id , Request $request) {
        $facture = facture::find($id);
        $suivi = suivi::find($request->suivi_id);
        $facture->update([
            "suivi_id" => $suivi->id
        ]);
        $suivi->update([
            "facture_id" => $id
        ]);
        return redirect()->route('sadmin.suivis');
    }

    public function bons_list_to_take($id) {
        $data = bon::all()->where('suivi_id',null);
        $suivi = suivi::find($id);
        return view('sadmin.content.bon.untacked',compact('data','suivi'));
    }

    public function add_bon_to_suivis($id , Request $request) {
        $facture = bon::find($id);
        $suivi = suivi::find($request->suivi_id);
        $facture->update([
            "suivi_id" => $suivi->id
        ]);
        $suivi->update([
            "bon_id" => $id
        ]);
        return redirect()->route('sadmin.suivis');
    }

    public function suivi_pdf($id) {
        $data = suivi::find($id);
        $pdf = Pdf::loadView('pdf.suivie',compact('data'));
        return $pdf->download('invoice.pdf');
        // dd($request)
    }
}
