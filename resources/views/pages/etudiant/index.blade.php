@extends('layout.asset')

@section('navbar')
    @include("layout.navbar-etu")
@endsection


@section('main')
    <section style="background-color: rgba(141, 141, 224, 0.192)">
        <div id="formation" style="min-height: 100vh" class="py-5">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <h3 class="mb-5 text-dark">Annonces (Offres & Stages)</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <section id="icon-boxes" class="icon-boxes">
                    <div class="container my-1">

                        <div class="row d-flex" style="flex-wrap:wrap">
                            @forelse ($alerts as $alert)
                                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up"
                                    {{-- overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical --}} style="margin-bottom: 30px!important;">
                                    <div class="icon-box">
                                        @php
                                            $l = $alert->tag=="Job" ? 'etudiant.job' : 'etudiant.stage'
                                        @endphp
                                        <h4 class="title"><a
                                                href="{{route($l,$alert->mime)}}">{{ $alert->titre }}</a>
                                        </h4>
                                        <p class="description" style="text-">
                                            <b>Organisation :</b>
                                            @foreach ($entreprises as $entreprise)
                                                @if ($entreprise->id == $alert->entreprise_id)
                                                    {{ $entreprise->type }}
                                                @endif
                                            @endforeach
                                            <b>Entreprise</b> : @foreach ($entreprises as $entreprise)
                                                @if ($entreprise->id == $alert->entreprise_id)
                                                    {{ $entreprise->nom }}
                                                @endif
                                            @endforeach
                                            <br>
                                            <b>Offre</b> : {{$alert->tag}}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <h4>...ras</h4>
                            @endforelse

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
