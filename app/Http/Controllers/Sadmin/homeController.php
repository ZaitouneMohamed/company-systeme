<?php

namespace App\Http\Controllers\Sadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
}
