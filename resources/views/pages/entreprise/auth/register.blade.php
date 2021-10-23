<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/semantic/semantic.min.css') }}">
<link href="{{ asset('assets/pages/welcome/css/styles.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
<script src="{{ asset('assets/pages/bachelier/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/semantic/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/semantic/loadingoverlay.min.js') }}"></script>
<script src="{{ asset('assets/pages/bachelier/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ asset('assets/semantic/sweetalert.min.js') }}"></script>


<style>
    header.main_part {
        min-height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)), url("{{ asset('assets/img/entrepriseBG.jpg') }}");
        background-size: cover;
        /* background-position-x: center; */
        background-repeat: no-repeat;
        background-clip: content-box;
        background-attachment: fixed;
        object-fit: fill,
    }

    @media screen and (max-width:768px) {
        body {
            background-size: cover;
        }
    }

    label.invalid {
        color: red;
        font-size: 13px;
    }

    input.invalid {
        border: 1px solid red;
    }

    input.success {
        border: 1px solid green;
    }

</style>


<header class="main_part">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 mt-4">
                <div class="card center">
                    <div class="card-header"><strong><a href="/">Student<span
                                    style="color: rgb(25, 162, 241)">Help</span></a></strong>&nbsp;Inscription</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('entreprise.enregister') }}"
                            id="entreprise_registration_form">
                            @csrf
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control" name="nom" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Adresse mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="localisation"
                                    class="col-md-4 col-form-label text-md-right">Localisation</label>
                                <div class="col-md-6">
                                    <input id="localisation" type="text" class="form-control" name="localisation"
                                        placeholder="Ex : Lomé, Quartier Administratif">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Numero de
                                    telephone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" placeholder="+228 xxxxxxxx"
                                        name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Votre mot de
                                    passe</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirmez
                                    votre mot de passe</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control"
                                        name="confirm_password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Type d'entreprise</label>
                                <div class="col-md-6">
                                    <select name="type" class="form-select" id="type">
                                        <option selected disabled>Selectionnez un type</option>
                                        <option value="Entreprise">Entreprise</option>
                                        <option value="StartUp">Start Up</option>
                                        <option value="ONG">ONG</option>
                                        <option value="Association">Association</option>
                                        <option value="Particulier">Particulier</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        S'inscrire
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="center text-center mt-4"><a href="{{ route('entreprise.connexion') }}">Vous avez déjà
                            un compte
                            ?
                            Connectez-vous directement</a> </div>
                </div>
            </div>
        </div>
    </div>
</header>





    @if (session('success'))
        <script>
            swal("Félicitation !", "Inscription reussie, Veuillez verifier votre boite mail afin d'activer votre compte",
                "success");
        </script>
    @endif

    @if (Session::has('entreprise_success_confirm'))
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



<script>
    window.baseUrl = "{{ URL::to('/') }}";
    $("#entreprise_registration_form").validate({
        errorClass: "invalid",
        validClass: "success",
        rules: {
            nom: {
                required: true,
                minlength: 2,
                maxlength: 100,
            },
            type: {
                required: true,
            },
            localisation: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: baseUrl + "/entreprise/inscription/entreprise_check_email_unique",
                    type: "post",
                    data: {
                        email: function() {
                            return $("#email").val()
                        },
                        "_token": $("meta[name='csrf-token']").attr('content')
                    }
                }
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 100
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            phone: {
                required: true,
            }
        },
        messages: {
            nom: {
                required: "Veuillez renseigner le nom de votre entreprise"
            },
            localisation: {
                required: "Veuillez renseigner la localisation de votre entreprise"
            },
            phone: {
                required: "Veuillez mentionner un numero joignable (Appel/Whatsapp)"
            },
            email: {
                required: "Veuillez renseigner votre adresse mail",
                email: "L'adresse email doit être sous le format exemple@exemple.com",
                remote: "Cette adresse mail a déjà été utilisée"
            },
            password: {
                required: "Veuillez entrer un mot de passe"
            },
            confirm_password: {
                required: "Vous devez confirmer votre mot de passe",
                equalTo: "Les mot de passe ne correspondent pas"
            },
            type: "Veuillez selectionner le type d'entreprise dont il s'agit"
        },
        mitHandler: function(form) {
            $.LoadingOverlay("show");
            form.submit();
        }

    })
</script>
