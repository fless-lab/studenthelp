<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::where("etudiant_id",session("etudiant.id"))->get();
        return view("pages.etudiant.profile.projet.index",["projets"=>$projets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.etudiant.profile.projet.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Projet::create([
            "titre" => $request->input("titre"),
            "domaine" => $request->input("domaine"),
            "description"=>$request->input("description"),
            "etudiant_id" => $request->input("etudiant_id"),
            "mime" => $request->input("mime")
        ]);

        return redirect()->back()->with('success',"Projet créé avec succès.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($mime)
    {
        $projet = Projet::where("mime",$mime)->first();
        return view("pages.etudiant.profile.projet.show",["projet"=>$projet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($mime)
    {
        $projet = Projet::where("mime",$mime)->first();
        return view("pages.etudiant.profile.projet.edit",$projet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //meme chose que store...
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy($mime)
    {
        $projet = Projet::where("mime",$mime)->first();
        dd($projet);
        $projet->delete();
        return redirect()->route("projet.index");
    }
}
