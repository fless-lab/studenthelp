@extends('layout.asset')

@section('navbar')
    @include("layout.navbar-etu")
@endsection


@section('main')
    <header class="masthead">
        <section style="margin-top: 10px">
            <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-5">
                <div class="section-title">
                    <h2>Inscription</h2>
                </div>
                <form action="{{ route('etudiant.enregister') }}" method="POST" id="etudiant_registration_form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input style="padding:30px" type="text" name="nom" class="form-control" id="nom"
                                placeholder="Votre nom">
                        </div>
                        <div class="col-md-6 form-group">
                            <input style="padding:30px" type="text" name="prenom" class="form-control" id="prenom"
                                placeholder="Votre prenom">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input style="padding:30px" type="text" class="form-control" name="matricule" id="matricule"
                            placeholder="Votre numero de carte">
                    </div>
                    <div class="form-group mt-3">
                        <input style="padding:30px" type="email" class="form-control" name="email" id="email"
                            placeholder="Votre adresse mail">
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input style="padding:30px" type="password" name="password" class="form-control" id="password"
                                placeholder="Votre mot de passe">
                        </div>
                        <div class="col-md-6 form-group">
                            <input style="padding:30px" type="password" name="confirm_password" class="form-control"
                                id="confirm_password" placeholder="Confirmez le mot de passe">
                        </div>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" name="terms" id="terms">
                        <label for="terms">J'ai lu et j'accepte les termes et les conditions</label><br>
                    </div>
                    <div id="terms_error"></div>

                    <div class="mx-auto text-center">
                        <button class="btn btn-primary" type="submit">S'inscrire</button>
                    </div>
                </form>
                <div class="center text-center mt-4"><a href="{{ route('etudiant.connexion') }}">Vous avez déjà un compte
                        ?
                        Connectez-vous directement</a> </div>
            </div>
            </div>

            </div>
        </section>
    </header>
@endsection


@section('script')
    @if (session('success'))
        <script>
            swal("Félicitation !", "Inscription reussie, Veuillez verifier votre boite mail afin d'activer votre compte", "success");
        </script>
    @endif

    @if (Session::has('etudiant_success_confirm'))
        <script>
            swal("Félicitation !", "Votre mail a été vérifié avec succès", "success");
        </script>
    @endif

    @if (Session::has('error_mail_invalid_url'))
        <script>
            swal("Erreur !", "URL invalide ou lien de confirmation expiré", "error");
        </script>
    @endif

    @if (Session::has('error_mail_already_verified'))
        <script>
            swal("Erreur !", "Cette adresse email a déja été vérifié", "warning");
        </script>
    @endif


@endsection
