@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Dashboard
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">
            Bienvenu sur votre profile {{session("etudiant.prenom")}}
        </h5>
    </div>
@endsection
