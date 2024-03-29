<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EntrepriseEmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $entreprise;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($entreprise)
    {
        $this->entreprise=$entreprise;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown("pages.entreprise.emails.auth.entreprise_email_verification_mail")->with([
            "entreprise"=>$this->entreprise
        ]);
    }
}
