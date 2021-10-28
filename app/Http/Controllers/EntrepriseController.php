<?php

namespace App\Http\Controllers;

use App\Mail\EntrepriseEmailVerificationMail;
use App\Models\Entreprise;
use App\Models\Etudiant;
use App\Models\Projet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EntrepriseController extends Controller
{
    public function index(){
        return view("pages.entreprise.index");
    }

    public function inscription(){
        return view("pages.entreprise.auth.register");
    }

    public function connexion(){
        return view("pages.entreprise.auth.login");
    }

    public function entreprise_check_email_unique(Request $request){
        $entreprise=Entreprise::where("email",$request->email)->first();
        if($entreprise){
            echo "false";
        }else{
            echo "true";
        }
    }

    public function enregistrerEntreprise(Request $request){

        // dd($request);
        $entreprise = Entreprise::create([
            "nom"=>$request->nom,
            "type"=>$request->type,
            "phone"=>$request->phone,
            "localisation"=>$request->localisation,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "email_verification_code"=>Str::random(40),
        ]);

        Mail::to($request->email)->send(new EntrepriseEmailVerificationMail($entreprise));
        // dd(Mail::to($request->email),new EntrepriseEmailVerificationMail($entreprise));
        session()->flash("success","Inscription reussie");
        return redirect()->back()->with('success',"Inscription réussie. SVP veuillez consulter votre boite mail pour le lien de verification.");
    }


    public function verify_email($verification_code){
        $entreprise=Entreprise::where("email_verification_code",$verification_code)->first();
        // dd($entreprise);
        if(!$entreprise){
            return redirect()->route("entreprise.inscription")->with('error_mail_invalid_url',"URL invalide ou expiré");
        }else{
            if($entreprise->email_verified_at){
                return redirect()->route("entreprise.inscription")->with('error_mail_already_verified',"Email déjà vérifié.");
            }else{
                $entreprise->update([
                    "email_verified_at"=>Carbon::now()
                ]);
                return redirect()->route("entreprise.inscription")->with('entreprise_success_confirm',"Email vérifié avec succès.");
            }
        }
    }

    public function connecterEntreprise(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:8"
        ]);


        $entreprise = Entreprise::where("email",$request->email)->first();

        if(!$entreprise){
            return redirect()->back()->with("login-error","Ce compte n'existe pas. Vous pouvez en creer avec cette adresse mail si c'est la votre.");
        }else{
            if(!$entreprise->email_verified_at){
                return redirect()->back()->with("login-error","l'Email n'a pas été vérifié");
            }else{
                if(!$entreprise->is_active){
                    return redirect()->back()->with("login-error","Ce compte est inactif. Veuillez contacter l'administrateur de ce site.");
                }else{
                    $ent = Entreprise::where([
                        "email" => $entreprise->email
                    ])->first();
                    if(Hash::check($request->password, $ent->password)){
                        $request->session()->put("entreprise", $ent);
                        return redirect("/entreprise");
                    }else{

                        return redirect()->back()->with("login-error","Identifiant ou mot de passe incorrecte");
                    }
                }
            }
        }
    }

    public function profile(){
        return view("pages.entreprise.profile.index");
    }

    public function edit_profile(){
        $entreprise = session("entreprise");
        return view("pages.entreprise.profile.edit_profile",["entreprise"=>$entreprise]);
    }

    public function update_profile(Request $request){
        $entreprise = session("entreprise");
        $entreprise->update([
            "nom"=>$request->nom,
            "localisation"=>$request->localisation,
            "phone"=>$request->phone,
            "type"=>$request->type
        ]);

        return redirect()->route("entreprise.edit_profile")->with("success","Mise à jour effectuée avec succès");
    }


    public function change_password(){
        return view("pages.entreprise.profile.change_password");
    }

    public function update_password(Request $request){
        $entreprise = session("entreprise");
        if(Hash::check($request->old_password, $entreprise->password)){
            $entreprise->update([
                "password"=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with("success","Mot de passe changé avec succès");
        }else{
            return redirect()->back()->with("error","L'ancien mot de passe ne correspond pas. Veuillez reesayer");
        }
    }

    public function deconnecterEntreprise(){
        if (session("entreprise")) {
            session()->pull('entreprise');
            return redirect()->route("entreprise");
        }
    }


    public function voirAllProjets(){
        $projets = Projet::all();
        $etudiants = Etudiant::all();
        return view("pages.entreprise.profile.services.projet.index",["projets"=>$projets,"etudiants"=>$etudiants]);
    }

    public function voirLeProjet($mime){
        $projet = Projet::where("mime",$mime)->first();
        $etudiants = Etudiant::all();
        return view("pages.entreprise.profile.services.projet.show",["projet"=>$projet,"etudiants"=>$etudiants]);
    }

}
