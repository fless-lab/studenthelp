@extends('pages.etudiant.profile.profile-layout')

<style>
    .segment:hover{
        font-size: larger;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header">
            Mes projets <a href="{{route("projet.create")}}" class="btn btn-primary btn-sm" style="float: right">Nouveau projet</a>
        </div>
    </div>
    <div class="card-body d-flex" style="flex-wrap: wrap">
        <ul></ul>
        @forelse ($projets as $projet)
           <a href="{{route('projet.show',$projet->mime)}}" class="ui segment m-1">
               {{$projet->titre}}
            </a>
        @empty
            <h5 class="center text-center mx-auto">Aucun projet n'a été détecté</h5>
        @endforelse
        </ul>
    </div>
@endsection
