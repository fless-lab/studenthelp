@extends('pages.entreprise.profile.profile-layout')

<style>
    .segment:hover{
        font-size: larger;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header">
            Mes alertes etudiant<a href="{{route("alert-etudiant.create")}}" class="btn btn-primary btn-sm" style="float: right">Nouvel alert</a>
        </div>
    </div>
    <div class="card-body d-flex" style="flex-wrap: wrap">
        <ul></ul>
        @forelse ($alerts as $alert)
           <a href="{{route('alert-etudiant.show',$alert->mime)}}" class="ui segment m-1">
               {{$alert->titre}}
            </a>
        @empty
            <h5 class="center text-center mx-auto">Aucun job ou stage proposé</h5>
        @endforelse
        </ul>
    </div>
@endsection
