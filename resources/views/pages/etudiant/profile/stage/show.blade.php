@extends('pages.etudiant.profile.profile-layout')

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
            <b>{{$stage->titre}}</b> de
            <em>
                @foreach ($entreprises as $entreprise)
                    @if ($entreprise->id == $stage->entreprise_id)
                        {{$entreprise->nom}}
                    @endif
                @endforeach
            </em>
        </div>
    </div>
    <div class="card-body" style="flex-wrap: wrap">
        <h6>Lien vers l'offre :
            @if($stage->lien)
                <a href="{{$stage->lien}}">{{$stage->lient}}</a>
            @else
                <span style="color: rgb(28, 60, 245)">Le lien n'est pas disponible</span>(Vous pouvez contacter l'entreprise via son mail)
            @endif
        </h6>
        <hr>
        <p><blockquote>{{$stage->description}}</blockquote></p>
        <hr>
        <div class="ui small segment">
            <span>Détails de l'entreprise</span> <br>
            @foreach ($entreprises as $entreprise)
                @if ($entreprise->id == $stage->entreprise_id)
                    Nom (Type) : {{$entreprise->nom}} ({{$entreprise->type}}) <br>
                    Email : <a style="color: rgb(53, 53, 241)" data-tooltip="Cliquez pour envoyer un message" href="mailto:{{$entreprise->email}}">{{$entreprise->email}}</a> <br>
                    <div class="ui divider"></div>
                    Date de post : @php
                    setlocale(LC_TIME, 'fr_FR');
                    echo strftime('%d %B %G', strtotime($entreprise->created_at));
                    @endphp <br>
                    Date de dernière modification : @php
                    setlocale(LC_TIME, 'fr_FR');
                    echo strftime('%d %B %G', strtotime($entreprise->updated_at));
                @endphp

                @endif
            @endforeach
        </div>
    </div>
@endsection
