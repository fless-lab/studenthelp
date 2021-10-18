@component('mail::message')

Hello {{$etudiant->nom}}
@component('mail::button', ['url' => route("etudiant.verifier_mail",$etudiant->email_verification_code)])
Cliquez ici pour verifier votre adresse mail
@endcomponent

<p>Ou copiez et collez  ce lien dans votre navigateur pour verifier votre adresse email</p>
<p><a href="{{route("etudiant.verifier_mail",$etudiant->email_verification_code)}}">{{route("etudiant.verifier_mail",$etudiant->email_verification_code)}}</a></p>
Merci,<br>
{{ config('app.name') }}
@endcomponent
