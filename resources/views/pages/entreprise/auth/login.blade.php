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
                                    style="color: rgb(25, 162, 241)">Help</span></a></strong>&nbsp;Connexion</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('entreprise.connecter') }}"
                            id="entreprise_login_form">
                            @csrf
                            @if (session()->get("login-error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attention !</strong> {{session()->get("login-error")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if (session()->get("error-auth-required"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attention !</strong> {{session()->get("error-auth-required")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Adresse mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Votre mot de
                                    passe</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Se connecter
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="center text-center mt-4">
                        <a href="{{ route('entreprise.inscription') }}">Vous avez déjà un compte ? Connectez-vous directement</a><br>
                        <a href="#">Avez-vous oublié votre mot de passe ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>





<script>
    window.baseUrl = "{{ URL::to('/') }}";
    $("#entreprise_login_form").validate({
        errorClass: "invalid",
        validClass: "success",
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "Veuillez renseigner votre adresse mail",
                email: "L'adresse email doit être sous le format exemple@exemple.com",
            },
            password: {
                required: "Veuillez entrer un mot de passe"
            }
        },
        submitHandler: function(form) {
            $.LoadingOverlay("show");
            form.submit();
        }

    })
</script>
