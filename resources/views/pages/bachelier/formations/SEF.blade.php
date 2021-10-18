@extends("pages.bachelier.formations.formation")


@section('formation')
    <div class="ui top attached tabular menu">
        <a class="active item" data-tab="licence">Licence</a>
        <a class="item" data-tab="master">Master</a>
        <a class="item" data-tab="doctorat">Doctorat</a>
    </div>

    <div class="ui active tab" data-tab="licence">
        <div class="ui segment">
            <div class="ui segment">
                <h3 class="ui center text-center">Les parcours du domaine des Sciences de l'Education et de la Formation</h3>
            </div>
            <table class="ui celled table">
                <thead>
                    <th>N°</th>
                    <th>Parcours</th>
                    <th>Établissement</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Licence Professionnelle - Anglais</td>
                        <td>INSE</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Licence Professionnelle - Éducation et Motricité</td>
                        <td>INJS</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Licence Professionnelle - Francais</td>
                        <td>INSE</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Licence Professionnelle - Histoire et Géographie</td>
                        <td>INSE</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Licence Professionnelle - Jeunesse,Developpement Communautaire et Entrepreneuriat</td>
                        <td>INJS</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Licence Professionnelle - Mathematique</td>
                        <td>INSE</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Licence Professionnelle - Physique et Chimie</td>
                        <td>INSE</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Licence Professionnelle - Science de la Vie et de la Terre</td>
                        <td>INSE</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Licence Professionnelle - Science de l'Education et de la Formation</td>
                        <td>INSE</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ui tab" data-tab="master">
        <div class="ui segment">
            <div class="ui segment">
                <h3 class="ui center text-center">Les parcours du domaine des Sciences de l'Education et de la Formation</h3>
            </div>
            <table class="ui celled table">
                <thead>
                    <th>N°</th>
                    <th>Parcours</th>
                    <th>Établissement</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Master Recherche - Agroéconomie</td>
                        <td>ESA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Master Recherche - Sciences des Productions Animales</td>
                        <td>ESA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Master Professionnel - Agrobioingénieur</td>
                        <td>ESA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Master Professionnel - Production Végétale et Résilience Agricole</td>
                        <td>ESA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ui tab" data-tab="doctorat">
        <div class="ui segment">
            <div class="ui segment">
                <h3 class="ui center text-center">Les parcours du domaine des Sciences de l'Education et de la Formation</h3>
            </div>
            <table class="ui celled table">
                <thead>
                    <th>N°</th>
                    <th>Parcours</th>
                    <th>Établissement</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Doctorat - Agroéconomie</td>
                        <td>ESA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Doctorat - Sciences Agronomiques</td>
                        <td>ESA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


@section("script")
    <script>
        $(".top.menu .item").tab()
    </script>
@endsection
