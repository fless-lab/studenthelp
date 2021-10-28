@component('mail::message')

Hello {{$etudiant_nom}}
@component('mail::button', ['url' => route("etudiant.forgetPass",$reset_code)])
Cliquez ici pour reinitialiser votre mot de passe
@endcomponent

<p>Ou copiez et collez  ce lien dans votre navigateur</p>
<p><a href="{{route("etudiant.forgetPass",$reset_code)}}">{{route("etudiant.forgetPass",$reset_code)}}</a></p>
Merci,<br>
{{ config('app.name') }}
@endcomponent
