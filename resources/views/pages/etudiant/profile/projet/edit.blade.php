@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Nouveau projets<a href="{{route("projet.index")}}" class="btn btn-primary btn-sm" style="float: right">Voir mes projets</a>
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('projet.update',$projet->mime) }}" method="post" role="form" id="projet_update_form">
                @csrf
                @method("PUT")
                <div class="form-group mt-3">
                    <input style="padding:10px"  type="text"
                        class="form-control" name="titre" id="titre" placeholder="Titre du projet" value="{{ old('titre') ? old('titre') : $projet->titre }}" required>
                </div>
                <div class="form-group mt-3">
                    <select class="form-select" name="domaine" id="domaine" required>
                        <option selected disabled>Selectionnez un domaine</option>
                        <option value="agriculture">Agriculture</option>
                        <option value="elevage">Elevage</option>
                        <option value="commerce">Commerce</option>
                        <option value="numerique">Numérique</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Décrivez le projet (Max : 500 caractère)</label>
                    <textarea type="text" class="form-control"
                    placeholder="Description complete/contenu du projet" name="description"  required maxlength="500"  cols="10" rows="5">{{ old('description') ? old('description') : $projet->description }}</textarea>
                </div>
                <div class="mx-auto text-center">
                    <button class="btn btn-primary" type="submit">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('script')
    @if (session('success'))
        <script>
            swal("Félicitation !", "Votre projet a été mis à jour avec succès", "success");
        </script>
    @endif
@endsection
