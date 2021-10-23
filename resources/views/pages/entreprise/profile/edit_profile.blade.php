@extends('pages.entreprise.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Mettre à jour vos informations personnelles
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('entreprise.update_profile') }}" method="post" role="form"
                id="entreprise_edit_profile_form">
                @csrf
                @method("PUT")
                <div class="form-group mt-3">
                    <input style="padding:10px" value="{{ old('nom') ? old('nom') : $entreprise->nom }}" type="text"
                        class="form-control" name="nom" id="nom" placeholder="Le nom de votre entreprise" required>
                </div>
                <div class="form-group mt-3">
                    <input style="padding:10px"
                        value="{{ old('localisation') ? old('localisation') : $entreprise->localisation }}" type="text"
                        class="form-control" name="localisation" id="localisation"
                        placeholder="Localisation de votre entreprise" required>
                </div>
                <div class="form-group mt-3">
                    <input style="padding:10px" value="{{ old('phone') ? old('phone') : $entreprise->phone }}" type="text"
                        class="form-control" name="phone" id="phone"
                        placeholder="Numero de telephone (Appel/Whatsapp) valide" required>
                </div>
                <div class="form-group mt-3">
                    <select name="type" class="form-select" id="type">
                        <option selected disabled>Selectionnez un type</option>
                        <option value="Entreprise">Entreprise</option>
                        <option value="StartUp">Start Up</option>
                        <option value="ONG">ONG</option>
                        <option value="Association">Association</option>
                        <option value="Particulier">Particulier</option>
                    </select>
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
