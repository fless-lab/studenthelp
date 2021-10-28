@extends('layout.asset')

@section('navbar')
    @include("layout.navbar-ent")
@endsection

<style>
    .profile-nav a:hover{
        font-size: larger;
        font-weight: bold;
        transition: all 0.4s ease-in-out;
    }
    .active-link{
        font-size: larger;
        font-weight: bold;
    }
    .card:hover{
        box-shadow: none!important;
    }
</style>

@section('main')
    <div class="row my-5">
        <div class="col-md-3">
            <ul class="list-group profile-nav">

                <a href="{{route("entreprise.profile")}}" class="{{(request()->route()->getName()=='entreprise.profile')?'active-link':''}}">
                    <li class="list-group-item">
                        Dashboard
                    </li>
                </a>
                <a href="{{route("entreprise.projets")}}" class="{{(request()->route()->getName()=='entreprise.projets')?'active-link':''}}">
                    <li class="list-group-item">
                        Voir les projets d'interêt
                    </li>
                </a>
                <a href="{{route('alert-etudiant.index')}}" class="{{(request()->route()->getName()=='alert-etudiant.index')?'active-link':''}}">
                    <li class="list-group-item">
                        Proposer des Jobs/Stages
                    </li>
                </a>
                {{-- <a href="#" class="">
                    <li class="list-group-item">
                        Proposer des offres de stages
                    </li>
                </a> --}}
                <a href="{{route("entreprise.edit_profile")}}" class="{{(request()->route()->getName()=='entreprise.edit_profile')?'active-link':''}}">
                    <li class="list-group-item">
                        Editer le profile
                    </li>
                </a>
                <a href="{{route("entreprise.change_password")}}" class="{{(request()->route()->getName()=='entreprise.change_password')?'active-link':''}}">
                    <li class="list-group-item">
                        Changer le mot de passe
                    </li>
                </a>

            </ul>
        </div>
        <div class="col-md-9" style="border-left: 1px solid #ddd">
            @yield("body")
        </div>
    </div>

@endsection
