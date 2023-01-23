<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index() {
        return view('admin.content.home');
    }

    public function users() {
        return view('admin.content.users.users.users');
    }
    
    public function admins() {
        return view('admin.content.users.admins');
    }

    public function super_admins() {
        return view('admin.content.users.superadmins');
    }
}
