<?php

namespace App\Http\Controllers;

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
        return view("pages.etudiant.index");
    }


    public function entreprise(){
        return view("pages.entreprise.index");
    }
}
