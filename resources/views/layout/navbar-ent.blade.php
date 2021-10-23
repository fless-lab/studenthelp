<nav class="navbare navbare-light bg-light static-top">
    <div class="container">
        <strong><a style="text-decoration: none" class="navbare-brand" href="/">Student<span style="color: rgb(25, 162, 241)">Help</span></a></strong>
        @if(!session("entreprise"))
            <a class="btn btn-primary btn-md" href="{{route('entreprise.connexion')}}"><i class="bi-person-circle"></i>&nbsp;&nbsp;Se connecter / S'inscrire</a>
        @else
        <div class="d-flex py-2" style="justify-items: self-end">
            <a href="{{route("entreprise")}}" class="{{(request()->route()->getName()=='entreprise')?'active-navlink':''}}" >Acceuil</a>
            &nbsp;
            &middot;
            &nbsp;
            <a href="{{route("entreprise.profile")}}" class="{{(request()->route()->getName()=='entreprise.profile')?'active-navlink':''}}">Mon compte</a>
            &nbsp;
            &middot;
            &nbsp;
            <a href="{{route('entreprise.deconnecter')}}">Déconnexion</a>
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
