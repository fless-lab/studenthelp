@extends('layout.asset')

@section('navbar')
    @include("layout.navbar-etu")
@endsection


@section('main')
    <header class="masthead">
        <section style="margin-top: 10px">
            <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-5">
                <div class="section-title">
                    <h2>Connexion</h2>
                </div>
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
                <form action="{{route('etudiant.connecter')}}" method="post" role="form" id="etudiant_login_form">
                    @csrf
                    <div class="form-group mt-3">
                        <input style="padding:30px"  type="email" class="form-control" name="email" id="email" placeholder="Votre email" required>
                    </div>
                    <div class="form-group mt-3">
                        <input style="padding:30px"  type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox"  name="remember" id="remember">
                        <label for="remember">Me garder connecter</label><br>
                    </div>
                    <div class="mx-auto text-center">
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                </form>
                <div class="center text-center mt-4"><a href="{{route('etudiant.inscription')}}">Vous n'êtes pas encore inscrit ? Créez votre compte</a> </div>
                <div class="center text-center mt-4"><a href="">Mot de passe oublié ?</a> </div>
            </div>
            </div>

            </div>
        </section>
    </header>
@endsection
