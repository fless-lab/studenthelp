@extends('pages.etudiant.profile.profile-layout')

<style>
    .segment:hover{
        font-size: larger;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header">
           <a href="{{route('projet.index')}}">&Leftarrow;</a>&nbsp;
            <b>{{$projet->titre}}</b>
            <a href="{{route("projet.edit",$projet->mime)}}" class="btn btn-success btn-sm" style="float: right">Modifier</a> &nbsp;
            <a href="{{route("projet.destroy",$projet->mime)}}" class="btn btn-danger btn-sm mx-2" style="float: right">Supprimer</a>
        </div>
    </div>
    <div class="card-body d-flex" style="flex-wrap: wrap">
        {{$projet->description}}
    </div>
@endsection
