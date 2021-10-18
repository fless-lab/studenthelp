<nav class="navbare navbare-light bg-light static-top">
    <div class="container">
        <strong><a style="text-decoration: none" class="navbare-brand" href="/">Student<span style="color: rgb(25, 162, 241)">Help</span></a></strong>
        @if(!session("etudiant"))
            <a class="btn btn-primary btn-md" href="{{route('etudiant.connexion')}}"><i class="bi-person-circle"></i>&nbsp;&nbsp;Se connecter / S'inscrire</a>
        @else
        <div class="d-flex py-2" style="justify-items: self-end">
            <a href="{{route("etudiant")}}" class="{{(request()->route()->getName()=='etudiant')?'active-navlink':''}}" >Acceuil</a>
            &nbsp;
            &middot;
            &nbsp;
            <a href="{{route("etudiant.profile")}}" class="{{(request()->route()->getName()=='etudiant.profile')?'active-navlink':''}}">Profile</a>
            &nbsp;
            &middot;
            &nbsp;
            <a href="#">Déconnexion</a>
        </div>
        @endif
    </div>
</nav>


<style>
    .active-navlink{
        font-weight: bold!important;
        text-decoration: none!important;
    }
</style>
