@extends('pages.entreprise.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Nouvel alert-etudiant<a href="{{route("alert-etudiant.index")}}" class="btn btn-primary btn-sm" style="float: right">Voir mes annonces</a>
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('alert-etudiant.update',$alert->mime) }}" method="post" role="form" id="alert_update_form">
                @csrf
                @method("PUT")
                <div class="form-group mt-3">
                    <select class="form-select" name="tag" id="tag">
                        <option selected disabled>Selectionnez le type d'offre</option>
                        <option value="Stage">Stage</option>
                        <option value="Job">Job etudiant</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <input style="padding:10px"  type="text"
                        class="form-control" name="titre" id="titre" value="{{ old('titre') ? old('titre') : $alert->titre }}" placeholder="Titre de l'alerte" required>
                </div>

                <div class="form-group mt-3">
                    <input style="padding:10px"  type="text"
                        class="form-control" name="lien" id="lien" value="{{ old('lien') ? old('lien') : $alert->lien }}" placeholder="Lien pour postuler à l'offre (Optionnel)">
                </div>

                <div class="form-group">
                    <label for="description">Décrivez l'offre (Max : 300 caractère)</label>
                    {{-- id="summary-ckeditor" --}}
                    <textarea type="text" class="form-control"
                    placeholder="Description complete/contenu de l'offre" name="description" maxlength="300" required autocomplete="description"  cols="10" rows="5">{{ old('description') ? old('description') : $alert->description }}</textarea>
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
            swal("Félicitation !", "Votre annonce a été mis à jour avec succès", "success");
        </script>
    @endif
@endsection
