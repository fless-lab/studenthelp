@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Mes projets <a href="{{route("projet.create")}}" class="btn btn-primary btn-sm" style="float: right">Nouveau projet</a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            Voici mes projets
        </h5>
    </div>
@endsection
