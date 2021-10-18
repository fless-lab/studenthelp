@extends('layout.asset')

@section('navbar')
    @include("layout.navbar-etu")
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

                <a href="{{route("etudiant.profile")}}" class="{{(request()->route()->getName()=='etudiant.profile')?'active-link':''}}">
                    <li class="list-group-item">
                        Dashboard
                    </li>
                </a>
                <a href="{{route("projet.index")}}" class="{{(request()->route()->getName()=='projet.index')?'active-link':''}}">
                    <li class="list-group-item">
                        Proposer des projets d'interêt
                    </li>
                </a>
                <a href="#" class="">
                    <li class="list-group-item">
                        Jobs Vaccances
                    </li>
                </a>
                <a href="#" class="">
                    <li class="list-group-item">
                        Voir les offres de stages
                    </li>
                </a>
                <a href="{{route("etudiant.edit_profile")}}" class="{{(request()->route()->getName()=='etudiant.edit_profile')?'active-link':''}}">
                    <li class="list-group-item">
                        Editer le profile
                    </li>
                </a>
                <a href="{{route("etudiant.change_password")}}" class="{{(request()->route()->getName()=='etudiant.change_password')?'active-link':''}}">
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
