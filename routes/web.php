<?php

use App\Http\Controllers\Annonceur\AnnonceController;
use App\Http\Controllers\Admin\AnnonceController as AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");

//A l'exception de l'affichage de la liste de tous les annonces (méthode index), toutes les routes ne peuvent être accessible que pour les utilisateurs authentifiés
Route::resource("annonce", AnnonceController::class)->except("index")->middleware("auth");
//On définit la route /annonce qui sera accessible par tout le monde (authentifié ou non)
Route::get("annonce", [AnnonceController::class, "index"])->name("annonce.index");


Route::middleware("guest")->group(function(){
    Route::get("register", [AuthController::class, "register"]);
    Route::post("register", [AuthController::class, "registerUser"])->name("register");


    Route::get("login", [AuthController::class, "login"]);
    Route::post("login", [AuthController::class, "loginUser"])->name("login");
});


Route::post("logout", [AuthController::class, "logout"])->name("logout")->middleware("auth");


Route::prefix("admin")->name("admin.")->middleware("auth")->group(function(){
    Route::resource("annonce",AdminController::class );
     Route::delete("changer_etat", [AdminController::class, "changer_etat"])->name("changer_etat");   
});