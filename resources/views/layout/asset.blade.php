<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description"
        content="StudentHelp n'a qu'un seul objectif , servir les etudiants et nouveaux bachelier ainsi que les entreprises locales." />
    <meta name="author" content="Abdou-Raouf ATARMLA" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Bienvenu sur la plateforme d'aide pour Etudiants</title>
    <link rel="icon" type="image/x-icon" href="" />
    <link href="{{ asset('assets/bootstrap/css/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css" />

    <style>
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

        .profile-nav {
            text-decoration: none;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/semantic/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/semantic/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/bachelier/css/style.css') }}">
    <link href="{{ asset('assets/pages/welcome/css/styles.css') }}" rel="stylesheet" />
    @yield("style")
</head>

<body>
    {{-- NavBar --}}
    @yield('navbar')

    {{-- Affichage principale --}}
    @yield('main')


    <!-- Footer-->
    @yield("footer")

    <script src="{{ asset('assets/pages/bachelier/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('assets/semantic/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/semantic/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/semantic/sweetalert.min.js') }}"></script>
    <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('assets/semantic/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('assets/pages/bachelier/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('script')
    <script src="{{ asset('assets/pages/welcome/js/scripts.js') }}"></script>




    <script>
        CKEDITOR.replace('summary-ckeditor');
        @if (session('etudiant_success_register'))
            // toastr.success("{{ session('etudiant_success_register') }}","Success",{timeOut:7000})
            // @endif
        @if (session('etudiant_success_register'))
            swal("Felicitation !","Inscription réussie","success");
        @endif


        window.baseUrl = "{{ URL::to('/') }}";

        $(".top.menu .item").tab()

        $("#etudiant_registration_form").validate({
            errorClass: "invalid",
            validClass: "success",
            rules: {
                nom: {
                    required: true,
                    minlength: 2,
                    maxlength: 100,
                },
                prenom: {
                    required: true,
                    minlength: 2,
                    maxlength: 100,
                },
                matricule: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                    // remote:{
                    //     url:baseUrl+"/etudiant/inscription/check_matricule_unique",
                    //     type:"post",
                    //     data:{
                    //         matricule:function(){
                    //             return $("#matricule").val()
                    //         },
                    //         "_token":$("meta[name='csrf-token']").attr('content')
                    //     }
                    // }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: baseUrl + "/etudiant/inscription/check_email_unique",
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
                terms: "required"
            },
            messages: {
                nom: {
                    required: "Veuillez renseigner votre nom"
                },
                prenom: {
                    required: "Veuillez renseigner votre prenom"
                },
                matricule: {
                    required: "Veuillez renseigner votre numero de carte d'étudiant",
                    // remote:"Ce matricule a déjà été utilisé"
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
                    required: "Vous devez confirmer votre mot de passe"
                },
                terms: "Veuillez acceptez les termes et conditions"
            },
            errorPlacement: function(error, element) {
                if (element.attr('name') == 'terms') {
                    error.appendTo($("#terms_error"))
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }

        })



        @if (session('etudiant_success_register'))
            // swal("Felicitation !","Inscription réussie","success");
            // @endif


        // window.baseUrl="{{ URL::to('/') }}";

        // $(".top.menu .item").tab()

        $("#etudiant_login_form").validate({
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


        $("#etudiant_edit_profile_form").validate({
            errorClass: "invalid",
            validClass: "success",
            rules: {
                nom: {
                    required: true
                },
                prenom: {
                    required: true
                },
            },
            messages: {
                nom: {
                    required: "Veuillez renseigner votre nom"
                },
                prenom: {
                    required: "Veuillez renseigner votre prenom"
                },
            },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }

        })


        $("#etudiant_change_password_form").validate({
            errorClass: "invalid",
            validClass: "success",
            rules: {
                old_password: {
                    required: true
                },
                new_password: {
                    required: true,
                    minLength:8
                },
                confirm_password: {
                    required: true,
                    equalTo: "#new_password"
                },
            },
            messages: {
                old_password: {
                    required: "Entrez votre ancien mot de passe"
                },
                new_password: {
                    required: "Veuillez entrer un nouveau mot de passe"
                },
                confirm_password: {
                    required: "Vous devez confirmer votre mot de passe"
                }
            },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }

        })


        $("#projet_create_form").validate({
            errorClass: "invalid",
            validClass: "success",
            rules: {
                titre: {
                    required: true,
                    minLength:5
                },
                description: {
                    required: true,
                    maxLength:500
                },
                domaine: {
                    required: true
                },
            },
            messages: {
                titre: {
                    required: "Veuillez saisir le titre de votre projet"
                },
                description: {
                    required: "Veuillez mentionner la description du projet"
                },
                domaine: {
                    required: "Vous devez choisir le domaine auquel appartient votre projet"
                }
            },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }

        })


        $("#projet_update_form").validate({
            errorClass: "invalid",
            validClass: "success",
            rules: {
                titre: {
                    required: true,
                    minLength:5
                },
                description: {
                    required: true,
                    maxLength:500
                },
                domaine: {
                    required: true
                },
            },
            messages: {
                titre: {
                    required: "Veuillez saisir le titre de votre projet"
                },
                description: {
                    required: "Veuillez mentionner la description du projet"
                },
                domaine: {
                    required: "Vous devez choisir le domaine auquel appartient votre projet"
                }
            },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }

        })


        $("#entreprise_edit_profile_form").validate({
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
            type: "Veuillez selectionner le type d'entreprise dont il s'agit"
        },
            submitHandler: function(form) {
                $.LoadingOverlay("show");
                form.submit();
            }

        })





    </script>
</body>

</html>
