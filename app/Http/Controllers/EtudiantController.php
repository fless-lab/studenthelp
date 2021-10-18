<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\EmailVerificationMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EtudiantController extends Controller
{
    public function index(){
        return view("pages.etudiant.index");
    }

    public function inscription(){
        return view("pages.etudiant.auth.register");
    }

    public function connexion(){
        return view("pages.etudiant.auth.login");
    }

    public function check_email_unique(Request $request){
        $etudiant=Etudiant::where("email",$request->email)->first();
        if($etudiant){
            echo "false";
        }else{
            echo "true";
        }
    }
    public function check_matricule_unique(Request $request){
        $etudiant=Etudiant::where("matricule",$request->matricule)->first();
        if($etudiant){
            echo "false";
        }else{
            echo "true";
        }
    }

    public function enregistrerEtudiant(Request $request){

        // $request->validate([
        //     "matricule"=>"required|email|unique:etudiants"
        // ],[
        //     "matricule.required"=>"Le numero de carte saisie a déjà été utilisé",
        // ]);

        $etudiant = Etudiant::create([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "email"=>$request->email,
            "matricule"=>$request->matricule,
            // "password"=>bcrypt($request->password),
            "password"=>Hash::make($request->input("password")),
            "email_verification_code"=>Str::random(40),
        ]);

        //Mail::to($request->email)->send(new EmailVerificationMail($etudiant));

        return redirect()->back()->with('etudiant_success_register',"Inscription réussie. SVP veuillez consulter votre boite mail pour le lien de verification.");
    }

    public function verify_email($verification_code){
        $etudiant=Etudiant::where("email_verification_code",$verification_code)->first();
        if(!$etudiant){
            return redirect()->back("etudiant.inscription")->with('error',"URL invalide");
        }else{
            if($etudiant->email_verified_at){
                return redirect()->back("etudiant.inscription")->with('error',"Email déjà vérifié.");
            }else{
                $etudiant->update([
                    "email_verified_at"=>Carbon::now()
                ]);
                return redirect()->back("etudiant.inscription")->with('etudiant_success_confirm',"Email vérifié avec succès.");
            }
        }
    }

    public function connecterEtudiant(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:8"
        ]);


        $etudiant = Etudiant::where("email",$request->email)->first();

        if(!$etudiant){
            return redirect()->back()->with("login-error","Ce compte n'existe pas. Vous pouvez en creer avec cette adresse mail si c'est la votre.");
        }else{
            if(!$etudiant->email_verified_at){
                return redirect()->back()->with("login-error","l'Email n'a pas été vérifié");
            }else{
                if(!$etudiant->is_active){
                    return redirect()->back()->with("login-error","Ce compte est inactif. Veuillez contacter l'administrateur de ce site.");
                }else{
                    $etu = Etudiant::where([
                        "email" => $etudiant->email
                    ])->first();
                    if(Hash::check($request->password, $etu->password)){
                        $request->session()->put("etudiant", $etu);
                        return redirect("/etudiant");
                    }else{
                        return redirect()->back()->with("login-error","Identifiant ou mot de passe incorrecte");
                    }
                }
            }
        }
    }

    public function profile(){
        return view("pages.etudiant.profile.index");
    }

    public function edit_profile(){
        $etudiant = session("etudiant");
        return view("pages.etudiant.profile.edit_profile",["etudiant"=>$etudiant]);
    }

    public function update_profile(Request $request){
        $etudiant = session("etudiant");
        $etudiant->update([
            "nom"=>$request->nom,
            "prenom"=>$request->prenom
        ]);

        return redirect()->route("etudiant.edit_profile")->with("success","Mise à jour effectuée avec succès");
    }


    public function change_password(){
        return view("pages.etudiant.profile.change_password");
    }

    public function update_password(Request $request){
        $etudiant = session("etudiant");
        if(Hash::check($request->old_password, $etudiant->password)){
            $etudiant->update([
                "password"=>bcrypt($request->new_password)
            ]);
            return redirect()->back()->with("success","Mot de passe changé avec succès");
        }else{
            return redirect()->back()->with("error","L'ancien mot de passe ne correspond pas. Veuillez reesayer");
        }
    }


    public function deconnecterEtudiant(){
        if (session("etudiant")) {
            session()->pull('etudiant');
            return redirect()->route("etudiant");
        }
    }
}

