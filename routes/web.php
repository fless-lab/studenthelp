<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PagesController;
use App\Models\Etudiant;
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

Route::get('/', [PagesController::class,"welcome"]);
Route::get('/espace-bachelier', [PagesController::class,"bachelier"])->name("bachelier");
Route::get('/espace-etudiant', [PagesController::class,"etudiant"])->name("etudiant");
Route::get('/espace-entreprise', [PagesController::class,"entreprise"])->name("entreprise");


Route::get('/formations/{nom}', function ($nom) {
    return view("pages.bachelier.formations.$nom");
});


//Etudiant

Route::get('/etudiant',[EtudiantController::class,"index"])->name("etudiant.index");

Route::get("/etudiant/inscription",[EtudiantController::class,"inscription"])->name("etudiant.inscription");
Route::post("/etudiant/inscription",[EtudiantController::class,"enregistrerEtudiant"])->name("etudiant.enregister");

Route::get("/etudiant/connexion",[EtudiantController::class,"connexion"])->name("etudiant.connexion");
Route::post("/etudiant/connexion",[EtudiantController::class,"connecterEtudiant"])->name("etudiant.connecter");

Route::post("/etudiant/deconnexion",[EtudiantController::class,"deconnecterEtudiant"])->name("etudiant.deconnecter");

Route::post("/etudiant/inscription/check_email_unique",[EtudiantController::class,"check_email_unique"])->name("etudiant.check_email_unique");
Route::post("/etudiant/inscription/check_matricule_unique",[EtudiantController::class,"check_matricule_unique"])->name("etudiant.check_matricule_unique");

Route::get("/etudiant/inscription/verifier-mail/{verification_code}",[[EtudiantController::class,"verify_email"]])->name("etudiant.verifier_mail");

Route::get("/etudiant/profile",[EtudiantController::class,"profile"])->name("etudiant.profile");

Route::get("/etudiant/changer-mon-mot-de-passe",[EtudiantController::class,"change_password"])->name("etudiant.change_password");
Route::post("/etudiant/changer-mon-mot-de-passe",[EtudiantController::class,"update_password"])->name("etudiant.update_password");

Route::get("/etudiant/editer-mon-profile",[EtudiantController::class,"edit_profile"])->name("etudiant.edit_profile");
Route::put("/etudiant/editer-mon-profile",[EtudiantController::class,"update_profile"])->name("etudiant.update_profile");



