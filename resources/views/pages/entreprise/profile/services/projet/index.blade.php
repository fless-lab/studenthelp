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
            Projets d'intérêt proposés par les étudiants
        </div>
    </div>
    <div class="card-body d-flex" style="flex-wrap: wrap">
        <ul></ul>
        @forelse ($projets as $projet)
           <a href="{{route('entreprise.projet',$projet->mime)}}" class="ui segment m-1">
               <span class="lead">
                    {{$projet->titre}}
                    <span style="color: rgba(58, 150, 236, 0.795)" class="small">
                        (
                            @foreach ($etudiants as $etudiant)
                                @if ($etudiant->id == $projet->etudiant_id)
                                    {{$etudiant->prenom}} {{$etudiant->nom}}
                                @endif
                            @endforeach
                        )
                    </span>
                </span>
            </a>
        @empty
            <h5 class="center text-center mx-auto">Aucun projet n'a été détecté</h5>
        @endforelse
        </ul>
    </div>
@endsection
