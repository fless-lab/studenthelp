<?php

namespace App\Http\Controllers;

use App\Models\AlertEtudiant;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class AlertEtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = AlertEtudiant::where("entreprise_id",session("entreprise.id"))->get();
        return view("pages.entreprise.profile.services.alertes.index",["alerts"=>$alerts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.entreprise.profile.services.alertes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        AlertEtudiant::create([
            "titre" => $request->input("titre"),
            "tag" => $request->input("tag"),
            "description"=>$request->input("description"),
            "entreprise_id" => $request->input("entreprise_id"),
            "mime" => $request->input("mime"),
            "lien"=>$request->input("lien")
        ]);

        return redirect()->back()->with('success',"Offre créé avec succès.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlertEtudiant  $alertEtudiant
     * @return \Illuminate\Http\Response
     */
    public function show($mime)
    {
        $alert = AlertEtudiant::where("mime",$mime)->first();
        return view("pages.entreprise.profile.services.alertes.show",["alert"=>$alert]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlertEtudiant  $alertEtudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($mime)
    {
        $alert = AlertEtudiant::where("mime",$mime)->first();
        return view("pages.entreprise.profile.services.alertes.edit",["alert"=>$alert]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlertEtudiant  $alertEtudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$mime)
    {
        AlertEtudiant::where("mime",$mime)->update([
            "titre" => $request->input("titre"),
            "tag" => $request->input("tag"),
            "lien"=>$request->input("lien"),
            "description"=>$request->input("description"),
        ]);

        return redirect()->back()->with('success',"Mise à jour effectuée avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlertEtudiant  $alertEtudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($mime)
    {
        $alert = AlertEtudiant::where("mime",$mime)->first();
        $alert->delete();
        return redirect()->route("alert-etudiant.index");
    }
}
