<?php

use App\Http\Controllers\AlertEtudiantController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjetController;
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

Route::get('/', [PagesController::class, "welcome"]);
Route::get('/espace-bachelier', [PagesController::class, "bachelier"])->name("bachelier");
Route::get('/espace-etudiant', [PagesController::class, "etudiant"])->name("etudiant");
Route::get('/espace-entreprise', [PagesController::class, "entreprise"])->name("entreprise")->middleware("entreprise_auth");


Route::get('/formations/{nom}', function ($nom) {
    return view("pages.bachelier.formations.$nom");
});


//Etudiant

Route::group(["middleware" => ["etudiant_bhist"]], function () {

    Route::group(["prefix" => "etudiant"], function () {
        Route::get('/', [EtudiantController::class, "index"])->name("etudiant.index");

        Route::group(["middleware" => ["etudiant_guest"]], function () {
            Route::get("/inscription", [EtudiantController::class, "inscription"])->name("etudiant.inscription");
            Route::post("/inscription", [EtudiantController::class, "enregistrerEtudiant"])->name("etudiant.enregister");

            Route::get("/connexion", [EtudiantController::class, "connexion"])->name("etudiant.connexion");
            Route::post("/connexion", [EtudiantController::class, "connecterEtudiant"])->name("etudiant.connecter");


            Route::post("/inscription/check_email_unique", [EtudiantController::class, "check_email_unique"])->name("etudiant.check_email_unique");
            Route::post("/inscription/check_matricule_unique", [EtudiantController::class, "check_matricule_unique"])->name("etudiant.check_matricule_unique");

            Route::get("/inscription/verifier-mail/{verification_code}", [EtudiantController::class, "verify_email"])->name("etudiant.verifier_mail");

            Route::get("/mot-de-passe-oublie",[EtudiantController::class,"mot_de_passe_oublie"])->name("etudiant.forgetPass");
            Route::post("/mot-de-passe-oublie",[EtudiantController::class,"reset_mot_de_passe_link"])->name("etudiant.resetPass");

            Route::get("/reinitialier-mot-de-passe/{reset_code}",[EtudiantController::class,"reset_mot_de_passe"])->name("etudiant.reset_password");
        });

        Route::get("/deconnexion", [EtudiantController::class, "deconnecterEtudiant"])->name("etudiant.deconnecter")->middleware("etudiant_auth");

        Route::group(["middleware" => ["etudiant_auth"]], function () {

            // Profile
            Route::get("/profile", [EtudiantController::class, "profile"])->name("etudiant.profile");

            Route::get("/changer-mon-mot-de-passe", [EtudiantController::class, "change_password"])->name("etudiant.change_password");
            Route::post("/changer-mon-mot-de-passe", [EtudiantController::class, "update_password"])->name("etudiant.update_password");

            Route::get("/editer-mon-profile", [EtudiantController::class, "edit_profile"])->name("etudiant.edit_profile");
            Route::put("/editer-mon-profile", [EtudiantController::class, "update_profile"])->name("etudiant.update_profile");


            // Projet
            Route::resource('/projet', ProjetController::class);

            //Stages
            Route::get("/stages", [EtudiantController::class, "voirAllStages"])->name("etudiant.stages");
            Route::get("/stages/{mime}", [EtudiantController::class, "voirLeStage"])->name("etudiant.stage");

            //Jobs
            Route::get("/jobs", [EtudiantController::class, "voirAllJobs"])->name("etudiant.jobs");
            Route::get("/jobs/{mime}", [EtudiantController::class, "voirLeJob"])->name("etudiant.job");
        });
    });
});


Route::group(["prefix" => "entreprise"], function () {
    Route::get('/', [EntrepriseController::class, "index"])->name("entreprise.index")->middleware("entreprise_auth");

    Route::get("/inscription", [EntrepriseController::class, "inscription"])->name("entreprise.inscription");
    Route::post("/inscription", [EntrepriseController::class, "enregistrerEntreprise"])->name("entreprise.enregister");


    Route::get("/connexion", [EntrepriseController::class, "connexion"])->name("entreprise.connexion");
    Route::post("/connexion", [EntrepriseController::class, "connecterEntreprise"])->name("entreprise.connecter");


    Route::post("/inscription/entreprise_check_email_unique", [EntrepriseController::class, "entreprise_check_email_unique"])->name("entreprise.check_email_unique");
    Route::post("/inscription/check_matricule_unique", [EntrepriseController::class, "check_matricule_unique"])->name("entreprise.check_matricule_unique");

    Route::get("/inscription/verifier-mail/{verification_code}", [EntrepriseController::class, "verify_email"])->name("entreprise.verifier_mail");

    Route::get("/deconnexion", [EntrepriseController::class, "deconnecterEntreprise"])->name("entreprise.deconnecter")->middleware("entreprise_auth");

    Route::group(["middleware" => ["entreprise_auth"]], function () {

        // Profile
        Route::get("/profile", [EntrepriseController::class, "profile"])->name("entreprise.profile");

        Route::get("/changer-mon-mot-de-passe", [EntrepriseController::class, "change_password"])->name("entreprise.change_password");
        Route::post("/changer-mon-mot-de-passe", [EntrepriseController::class, "update_password"])->name("entreprise.update_password");

        Route::get("/editer-mon-profile", [EntrepriseController::class, "edit_profile"])->name("entreprise.edit_profile");
        Route::put("/editer-mon-profile", [EntrepriseController::class, "update_profile"])->name("entreprise.update_profile");

        Route::get("/projets", [EntrepriseController::class, "voirAllProjets"])->name("entreprise.projets");
        Route::get("/projets/{mime}", [EntrepriseController::class, "voirLeProjet"])->name("entreprise.projet");


        //Alerte (Jobs/Stages)
        Route::resource('/alert-etudiant', AlertEtudiantController::class);
    });
});
