@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Mettre à jour vos informations personnelles
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('etudiant.update_profile') }}" method="post" role="form" id="etudiant_edit_profile_form">
                @csrf
                @method("PUT")
                <div class="form-group mt-3">
                    <input style="padding:10px" value="{{ old('nom') ? old('nom') : $etudiant->nom }}" type="text"
                        class="form-control" name="nom" id="nom" placeholder="Votre nom" required>
                </div>
                <div class="form-group mt-3">
                    <input style="padding:10px" value="{{ old('prenom') ? old('prenom') : $etudiant->prenom }}" type="text"
                        class="form-control" name="prenom" id="prenom" placeholder="Votre prenom" required>
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
            swal("Félicitation !", "Vos informations ont été mise à jour avec succès", "success");
        </script>
    @endif


@endsection
