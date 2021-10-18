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
                <h3 class="ui center text-center">Les parcours du domaine Lettres, Langues et Art</h3>
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
                        <td>Licence Professionnelle - Interpretariat-Traduction Français-Chinois-Français</td>
                        <td>CONFICIUS</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Licence Fondamentale - Allemand</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Licence Fondamentale - Anglais</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Licence Fondamentale - Linguistique générale</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Licence Fondamentale - Littérature Africaine et du Monde</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Licence Fondamentale - Littérature et Civilisation Hispanique</td>
                        <td>FLLA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ui tab" data-tab="master">
        <div class="ui segment">
            <div class="ui segment">
                <h3 class="ui center text-center">Les parcours du domaine Lettres, Langues et Art</h3>
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
                        <td>Master Recherche - Allemand</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Master Recherche - Etudes Germaniques Interculturelles</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Master Recherche - Études Ibériques</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Master Recherche - Lettres Modernes</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Master Recherche - Linguistique</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Master Recherche - Linguistique générale</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Master Recherche - Littérature Américaine</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Master Recherche - Litterature Anglaise</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Master Recherche - Littérature de l'Afrique Anglophone</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Master Recherche - Linguistique Anglaise</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Master Recherche - Litterature et Civilisation Hispanique</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Master Recherche - Littérature Francophone</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Master Professionnelle - Théâtre et Éducation</td>
                        <td>FLLA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ui tab" data-tab="doctorat">
        <div class="ui segment">
            <div class="ui segment">
                <h3 class="ui center text-center">Les parcours du domaine Lettres, Langues et Art</h3>
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
                        <td>Doctorat - Allemand</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Doctorat - Angais</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Doctorat - Espagnole</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Doctorat - Lettres Modernes</td>
                        <td>FLLA</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Doctorat - Linguistique</td>
                        <td>FLLA</td>
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
