@extends('pages.etudiant.profile.profile-layout')


@section('body')
    <div class="card">
        <div class="card-header">
            Changer votre mot de passe
        </div>
    </div>
    <div class="card-body">
        <div class="col-lg-6 mt-5 mt-lg-0 mx-auto card p-3">
            <form action="{{ route('etudiant.update_password') }}" method="post" role="form"
                id="etudiant_change_password_form">
                @csrf
                <div class="form-group mt-3">
                    <input style="padding:10px" type="password" class="form-control" name="old_password" id="old_password"
                        placeholder="Votre ancien mot de passe" required>
                </div>
                <div class="form-group mt-3">
                    <input style="padding:10px" type="password" class="form-control" name="new_password" id="new_password"
                        placeholder="Votre nouveau mot de passe" required>
                </div>
                <div class="form-group mt-3">
                    <input style="padding:10px" type="password" class="form-control" name="confirm_password"
                        id="confirm_password" placeholder="Confirmer votre nouveau mot de passe" required>
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
            swal("Félicitation !", "Votre mot de passe a été mis à jour avec succès", "success");
        </script>
    @else
        @if (session('error'))
            <script>
                swal("Félicitation !", "L'ancien mot de passe ne correspond pas. Veuillez reesayer.","error");
            </script>
        @endif
    @endif


@endsection
