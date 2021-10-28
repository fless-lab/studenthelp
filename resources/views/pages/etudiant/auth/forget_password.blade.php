@extends('layout.asset')



@section('main')
    <header class="masthead">
        <section style="margin-top: 10px">
            <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-5">
                <div class="section-title">
                    <h2>Mot de passe oublié</h2>
                </div>
                @if (session()->get("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attention !</strong> {{session()->get("error")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if (session()->get("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get("success")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                {{-- @if (session()->get("error-auth-required"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Attention !</strong> {{session()->get("error-auth-required")}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif --}}
                <form action="{{route("etudiant.resetPass")}}" method="post" role="form" id="etudiant_forget_password_form">
                    @csrf
                    <div class="form-group mt-3">
                        <input style="padding:30px"  type="email" class="form-control" name="email" id="email" placeholder="Votre email" required>
                    </div>
                    <div class="mx-auto text-center">
                        <button class="btn btn-primary" type="submit">Continuer</button>
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
