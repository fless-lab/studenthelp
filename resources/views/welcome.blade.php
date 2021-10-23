<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bienvenu sur la plateforme d'aide pour Etudiants</title>
        <link rel="icon" type="image/x-icon" href="" />
        <link href="{{asset('assets/bootstrap/css/bootstrap-icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/font-awesome.css')}}">
        <link href="{{asset('assets/pages/welcome/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        {{-- navbar --}}
        <nav class="navbare navbare-light bg-light static-top">
            <div class="container">
                <strong><a class="navbare-brand" href="">Student<span style="color: rgb(25, 162, 241)">Help</span></a></strong>
                <a class="btn btn-primary btn-sm" href="#contact">Contactez-Nous</a>
            </div>
        </nav>

        {{-- Affichage principale --}}
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <h1 class="mb-5">Bienvenu sur Student<span style="color: rgb(25,162,241)">Help</span>.</h1>
                            <h5>Continuer en tant que ...</h5>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="features-icons bg-light text-center" style="margin-top: -15rem">
            <div class="container">
                <div class="row mx-auto center justify-content-center">
                    <a class="col-lg-3 col-md-3 card m-2" href="{{route('bachelier')}}">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-info-lg m-auto text-primary"></i></div>
                            <h3>Bachelier</h3>
                            <p class=" mb-0">Pour tous ceux qui veulent debuter à l'université de lomé</p>
                        </div>
                    </a>
                    <a class="col-lg-3 col-md-3 card m-2" href="{{route('etudiant')}}">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-bell m-auto text-primary"></i></div>
                            <h3>Étudiant</h3>
                            <p class=" mb-0">Vous avez dejà de l'experience en tant qu'Étudiant , Cliquez ici.</p>
                        </div>
                    </a>
                    <a class="col-lg-3 col-md-3 card m-2" href="{{route('entreprise')}}">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-bag m-auto text-primary"></i></div>
                            <h3>Entreprise</h3>
                            <p class=" mb-0">Vous êtes une Entreprise , Startup ,Particulier , Association etc...</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Testimonials-->
        <section class="testimonials text-center">
            <div class="container">
                <h2 class="mb-5">Qui somme nous ?</h2>
                <div class="row">
                    <div class="container center mx-auto text-center" style="text-justify: justidy">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis, iure rem. Totam soluta vitae necessitatibus repellat optio? Neque, aliquam accusamus.</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur recusandae illum pariatur quis perferendis unde, similique vel? Quia soluta, eaque, doloremque similique esse fugit vero nostrum debitis, nam nemo facere.</p>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, accusamus.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="contact">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="">Contactez notre equipe.</h2>
                        <form class="" id="">
                                <div class="col my-2">
                                    <input class="form-control form-control-md" id="" type="email" placeholder="Votre adresse mail"/>
                                    <span></span>
                                </div>
                                <div class="col my-2">
                                    <textarea class="form-control form-control-md" id="" type="text" placeholder="Votre message"></textarea>
                                    <span></span>
                                </div>
                                <div class="col-auto"><button class="btn btn-primary btn-md" id="" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row center mx-auto">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">Accueil</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Qui sommes nous ?</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; studenthelp.org. Tous droits reservés.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-whatsapp fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-linkedin fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-envelope fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/pages/welcome/js/scripts.js')}}"></script>
    </body>
</html>
