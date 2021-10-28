@extends('pages.entreprise.profile.profile-layout')

<style>
    .card{
        cursor: pointer;
    }
    .segment:hover{
        border: none!important;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header">
            Détails du projet
            <b>{{$projet->titre}}</b> de
            <em>
                @foreach ($etudiants as $etudiant)
                    @if ($etudiant->id == $projet->etudiant_id)
                        {{$etudiant->prenom}} {{$etudiant->nom}}
                    @endif
                @endforeach
            </em>
        </div>
    </div>
    <div class="card-body" style="flex-wrap: wrap">
        <h6>Domaine : {{ $projet->domaine }}</h6>
        <hr>
        <blockquote>{{$projet->description}}</blockquote>
        <hr>
        <div class="ui small segment">
            <span>Détails de l'étudiant</span> <br>
            @foreach ($etudiants as $etudiant)
                @if ($etudiant->id == $projet->etudiant_id)
                    Nom & Prénoms : {{$etudiant->prenom}} {{$etudiant->nom}} <br>
                    Email : <a style="color: rgb(53, 53, 241)" data-tooltip="Cliquez pour envoyer un message" href="mailto:{{$etudiant->email}}">{{$etudiant->email}}</a> <br>
                    <div class="ui divider"></div>
                    Date de post : @php
                    setlocale(LC_TIME, 'fr_FR');
                    echo strftime('%d %B %G', strtotime($projet->created_at));
                    @endphp <br>
                    Date de dernière modification : @php
                    setlocale(LC_TIME, 'fr_FR');
                    echo strftime('%d %B %G', strtotime($projet->updated_at));
                @endphp

                @endif
            @endforeach
        </div>
    </div>
@endsection
