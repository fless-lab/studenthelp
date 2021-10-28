@extends('layout.asset')

@section('main')
    <header class="masthead">
        <section style="margin-top: 10px">
            <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-5">
                <div class="section-title">
                    <h2>Réinitialiser le mot de passe</h2>
                </div>
                <form action="{{ route('etudiant.enregister') }}" method="POST" id="etudiant_registration_form">
                    @csrf
                        <div class="mt-3 form-group">
                            <input style="padding:30px" type="password" name="password" class="form-control" id="password"
                                placeholder="Votre mot de passe">
                        </div>
                        <div class="mt-3 form-group">
                            <input style="padding:30px" type="password" name="confirm_password" class="form-control"
                                id="confirm_password" placeholder="Confirmez le mot de passe">
                        </div>

                    <div class="mx-auto text-center">
                        <button class="btn btn-primary" type="submit">Réinitialiser</button>
                    </div>
                </form>
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
