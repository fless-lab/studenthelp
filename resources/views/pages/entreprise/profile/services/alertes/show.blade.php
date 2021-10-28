@extends('pages.entreprise.profile.profile-layout')

<style>
    .segment:hover {
        font-size: larger;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header d-flex">
            <a href="{{ route('alert-etudiant.index') }}">&Leftarrow;</a>&nbsp;
            <div class="d-flex">
                <b>{{ $alert->titre }}</b>
                <a class="mx-2">
                    <form action="{{ url('/entreprise/alert-etudiant/' . $alert->mime) }}" method="POST">
                        @csrf
                        @method("delete")
                        <button class="btn float-right btn-danger btn-sm btn-icon-text">
                            <i class="ti-close btn-icon-prepend"></i>
                            Supprimer
                        </button>
                    </form>
                </a>
                <a href="{{ route('alert-etudiant.edit', $alert->mime) }}" class="btn btn-success btn-sm">Modifier</a>
            </div>
            &nbsp;
        </div>
        <div class="card-body" style="flex-wrap: wrap">
            <h6>Type d'alert : {{ $alert->tag }}</h6>
            <hr>
            <blockquote>{{$alert->description}}</blockquote>
            <hr>

            <h6>Lien : <span style="color: rgba(36, 93, 250, 0.966)">{{ $projet->lien ?? 'Vous n\'avez ajouté aucun lien' }}</span></h6>
        </div>
    @endsection
