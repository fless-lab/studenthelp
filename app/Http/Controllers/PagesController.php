<?php

namespace App\Http\Controllers;

use App\Models\AlertEtudiant;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        return view("welcome");
    }


    public function bachelier(){
        return view("pages.bachelier.index");
    }


    public function etudiant(){
        $alerts = AlertEtudiant::all();
        $entreprises = Entreprise::all();
        return view("pages.etudiant.index",["alerts"=>$alerts,"entreprises"=>$entreprises]);
    }


    public function entreprise(){
        return view("pages.entreprise.index");
    }
}
