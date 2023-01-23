<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\Sadmin\homeController as shomeController;
use App\Http\Controllers\Sadmin\permissionsController;
use App\Http\Controllers\Sadmin\rolesController;
use App\Http\Controllers\user\homeController as UserHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filemanager', function () {
    return view('filemanager.filemanager');
});

Route::middleware(['auth', 'role:super admin', 'activecheck'])->name('sadmin.')->prefix("super-admin")->group(function () {
    Route::controller(shomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/admins_list', 'admins_list')->name('admins');
        Route::get('/super_admins', 'super_admins_list')->name('super.admins');
        Route::get('/users_list',  'users_list')->name('users.list');
        Route::get('/hebergement',  'hebergement')->name('hebergement');
        Route::get('/nom_domaine',  'nom_domain')->name('nom_domain');
        Route::get('/email_pro',  'emailPro')->name('email_pro');
        Route::get('/Cpanel', 'cpanel')->name('Cpanel');
        Route::get('/wordpress',  'wordpress')->name('wordpress');
        Route::post('assign_role/{id}', 'assign_role')->name('assign.role');
        Route::delete('remove_role',  'remove_role')->name('remove.role');
    });

    Route::resource('roles', rolesController::class);
    Route::resource('permissions', permissionsController::class);
    Route::get('/filemanager', function () {
        return view('sadmin.filemanager');
    })->name("filemanager");
});

Route::middleware(['auth', 'role:admin|super admin', 'activecheck'])->name('admin.')->prefix("admin")->group(function () {
    Route::controller(homeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/users', 'users')->name('users')->middleware('permission:add accounts');
        Route::get('/admins', 'admins')->name('admins')->middleware('permission:wordpress');
        Route::get('/superadmins', 'super_admins')->name('super_admins');
    });
});


Route::delete('//remove_role_to_user/{id}', [shomeController::class, 'remove_role_from_user'])->name('remove_role.from.user')->middleware(['auth', 'role:admin|super admin', 'activecheck']);


Route::middleware(['auth', 'role:user|super admin', 'activecheck'])->name('user.')->prefix("user")->group(function () {
    Route::controller(UserHomeController::class)->group(function () {
        Route::get('/hebergement', 'hebergement')->name('hebergement');
        Route::get('/nom_domaine', 'nom_domaines')->name('nomdomaine');
        Route::get('/email-pro', 'email_pro')->name('email_pro');
        Route::get('/cpanel', 'cpanel')->name('cpanel');
        Route::get('/wordpress', 'wordpress')->name('wordpress');
    });
    Route::get('/', function () {
        return view('user.content.home');
    })->name('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
