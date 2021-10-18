@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Nouveau projets<a href="{{route("projet.index")}}" class="btn btn-primary btn-sm" style="float: right">Voir mes projets</a>
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('projet.store') }}" method="post" role="form" id="projet_create_form">
                @csrf
                <input type="hidden" name="etudiant_id" value="{{session("etudiant.id")}}">
                <input type="hidden" name="mime" value="{{Str::random(30)}}">
                <div class="form-group mt-3">
                    <input style="padding:10px"  type="text"
                        class="form-control" name="titre" id="titre" placeholder="Titre du projet" required>
                </div>
                <div class="form-group mt-3">
                    <select class="form-select" name="domaine" id="domaine">
                        <option selected disabled>Selectionnez un domaine</option>
                        <option value="agriculture">Agriculture</option>
                        <option value="elevage">Elevage</option>
                        <option value="commerce">Commerce</option>
                        <option value="numerique">Numérique</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Décrivez le projet (Max : 500 caractère)</label>
                    {{-- id="summary-ckeditor" --}}
                    <textarea type="text" class="form-control"
                    placeholder="Description complete/contenu du projet" name="description" required autocomplete="description"  cols="10" rows="5"></textarea>
                </div>
                <div class="mx-auto text-center">
                    <button class="btn btn-primary" type="submit">Valider</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    @if (session('success'))
        <script>
            swal("Félicitation !", "Votre projet a été crée avec succès", "success");
        </script>
    @endif
@endsection
