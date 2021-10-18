@extends('layout.asset')

@section('navbar')
    @include("layout.navbar-bac")
@endsection

@section('main')
    <div class="mt-5 mx-auto">
        <div class="ui horizontal segments">
            <a href="/formations/LLA" data-tooltip="Lettres , Langues et Arts" class="ui segment">LLA</a>
            <a href="/formations/SA" data-tooltip="Sciences Agronomiques" class="ui segment">SA</a>
            <a href="/formations/SEF" data-tooltip="Science de l'Education et de la Formation" class="ui segment">SEF</a>
            <a href="/formations/SHS" data-tooltip="Science de l'Homme et de la Société" class="ui segment">SHS</a>
            <a href="/formations/SS" data-tooltip="Science de la Santé" class="ui segment">SS</a>
            <a href="/formations/SEG" data-tooltip="Sciences Economiques et de Gestion" class="ui segment">SEG</a>
            <a href="/formations/ST" data-tooltip="Sciences et Technologies" class="ui segment">ST</a>
            <a href="/formations/SJPA" data-tooltip="Sciences Juridiques , Politiques et de l'Administration" class="ui segment">SJPA</a>
        </div>
    </div>
    <section>
        @yield("formation")
    </section>
@endsection
