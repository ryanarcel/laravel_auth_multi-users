<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;


//use App\Http\Middleware\LoginMiddleware;

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
    return view("front");
})->name('front')->middleware('ifLoggedIn');

Route::post("authenticate", [LoginController::class, "login"])->name("login");

Route::middleware(['ifLoggedOut', 'manageAdminAccess'])->group(function () {

    Route::get('/admin-home', function () {
        return view("admin-home");
    })->name("admin-home");

    Route::get('/admin-contact', function () {
        return view("admin-contact");
    })->name("admin-contact");

});

Route::middleware(['ifLoggedOut', 'manageStaffAccess'])->group(function () {
    Route::get('/staff-home', function () {
        return view("staff-home");
    })->name("staff-home");
        
    Route::get('/staff-contact', function () {
        return view("staff-contact");
    })->name("staff-contact");

});

Route::post("authenticate-staff", [LoginController::class, "loginStaff"])->name("loginStaff");

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->flush();
    return redirect()->route('front');
});




