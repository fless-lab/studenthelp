@extends('pages.entreprise.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Nouveau projets<a href="{{route("alert-etudiant.index")}}" class="btn btn-primary btn-sm" style="float: right">Voir mes offres</a>
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('alert-etudiant.store') }}" method="post" role="form" id="offre_create_form">
                @csrf
                <div class="form-group mt-3">
                    <select class="form-select" name="tag" id="tag">
                        <option selected disabled>Selectionnez le type d'offre</option>
                        <option value="Stage">Stage</option>
                        <option value="Job">Job etudiant</option>
                    </select>
                </div>
                <input type="hidden" name="entreprise_id" value="{{session("entreprise.id")}}">
                <input type="hidden" name="mime" value="{{Str::random(30)}}">
                <div class="form-group mt-3">
                    <input style="padding:10px"  type="text"
                        class="form-control" name="titre" id="titre" placeholder="Titre de l'alerte" required>
                </div>

                <div class="form-group mt-3">
                    <input style="padding:10px"  type="text"
                        class="form-control" name="lien" id="lien" placeholder="Lien pour postuler à l'offre (Optionnel)">
                </div>

                <div class="form-group">
                    <label for="description">Décrivez l'offre (Max : 300 caractère)</label>
                    {{-- id="summary-ckeditor" --}}
                    <textarea type="text" class="form-control"
                    placeholder="Description complete/contenu de l'offre" name="description" required autocomplete="description" maxlength="300"  cols="10" rows="5"></textarea>
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
            swal("Félicitation !", "Votre offre a été crée avec succès", "success");
        </script>
    @endif
@endsection
