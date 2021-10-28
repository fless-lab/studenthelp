@component('mail::message')

Hello {{$entreprise->nom}}
@component('mail::button', ['url' => route("entreprise.verifier_mail",$entreprise->email_verification_code)])
Cliquez ici pour verifier votre adresse mail
@endcomponent

<p>Ou copiez et collez  ce lien dans votre navigateur pour verifier votre adresse email</p>
<p><a href="{{route("entreprise.verifier_mail",$entreprise->email_verification_code)}}">{{route("entreprise.verifier_mail",$entreprise->email_verification_code)}}</a></p>
Merci,<br>
{{ config('app.name') }}
@endcomponent
