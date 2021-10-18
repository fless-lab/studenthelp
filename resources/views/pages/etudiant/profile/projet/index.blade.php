@extends('pages.etudiant.profile.profile-layout')

<style>
    .segment:hover{
        font-size: larger;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header">
            Mes projets <a href="{{route("projet.create")}}" class="btn btn-primary btn-sm" style="float: right">Nouveau projet</a>
        </div>
    </div>
    <div class="card-body d-flex" style="flex-wrap: wrap">
        <ul></ul>
        @forelse ($projets as $projet)
           <a href="{{route('projet.show',$projet->mime)}}" class="ui segment m-1">
               {{$projet->titre}}
            </a>
        @empty
            <h5 class="center text-center mx-auto">Aucun projet n'a été détecté</h5>
        @endforelse
        </ul>
        {{-- <button
                type="button"
                class="btn btn-primary show_btn"
                data-mdb-toggle="modal"
                data-mdb-target="#projetModal"
            >voir</button>



            <div
                class="modal fade"
                id="projetModal"
                data-mdb-backdrop="static"
                data-mb-keyboard="false"
                tabindex="-1"
                role="dialog"
                aria-labelledby="projetModalLabel"
                aria-hidden="true"
                >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">titre</h5>
                        </div>
                        <button
                            type="button"
                            class="btn-close"
                            data-mdb-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <p>Body</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-mdb-dismiss="modal">
                            Fermer
                        </button>
                    </div>
                </div>
            </div> --}}
    </div>
@endsection

{{-- @section('script')
    <script>
        $(".show_btn").on('click',function(){
            $("#projetModal").show();
        });
    </script>
@endsection --}}
