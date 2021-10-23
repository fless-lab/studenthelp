@extends('pages.etudiant.profile.profile-layout')

<style>
    .segment:hover {
        font-size: larger;
    }

</style>

@section('body')
    <div class="card">
        <div class="card-header d-flex">
            <a href="{{ route('projet.index') }}">&Leftarrow;</a>&nbsp;
            <div class="d-flex">
                <b>{{ $projet->titre }}</b>
                <a class="mx-2">
                    <form action="{{ url('/etudiant/projet/' . $projet->mime) }}" method="POST">
                        @csrf
                        @method("delete")
                        <button class="btn float-right btn-danger btn-sm btn-icon-text">
                            <i class="ti-close btn-icon-prepend"></i>
                            Supprimer
                        </button>
                    </form>
                </a>
                <a href="{{ route('projet.edit', $projet->mime) }}" class="btn btn-success btn-sm">Modifier</a>
            </div>
            &nbsp;
        </div>
        <div class="card-body" style="flex-wrap: wrap">
            <h6>Domaine : {{ $projet->domaine }}</h6>
            <hr>
            <blockquote>{{$projet->description}}</blockquote>
        </div>
    @endsection
