@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Nouveau projets<a href="{{route("projet.index")}}" class="btn btn-primary btn-sm" style="float: right">Voir mes projets</a>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <h6>Je cree des projets</h6>
        </h5>
    </div>
@endsection
