@extends('pages.etudiant.profile.profile-layout')

<style>
    .card{
        cursor: pointer;
    }
    .segment:hover{
        border: none!important;
    }
</style>

@section('body')
    <div class="card">
        <div class="card-header">
            Stages pour étudiant proposés par les entreprises
        </div>
    </div>
    <div class="card-body d-flex" style="flex-wrap: wrap">
        <ul></ul>
        @forelse ($stages as $stage)
           <a href="{{route('etudiant.stage',$stage->mime)}}" class="ui segment m-1">
               <span class="lead">
                    {{$stage->titre}}
                    <span style="color: rgba(58, 150, 236, 0.795)" class="small">
                        (
                            @foreach ($entreprises as $entreprise)
                                @if ($entreprise->id == $stage->entreprise_id)
                                    {{$entreprise->nom}}
                                @endif
                            @endforeach
                        )
                    </span>
                </span>
            </a>
        @empty
            <h5 class="center text-center mx-auto">Aucun stage n'a été détecté</h5>
        @endforelse
        </ul>
    </div>
@endsection
