<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $etudiant;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($etudiant)
    {
        $this->etudiant=$etudiant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('pages.etudiant.emails.auth.email_verification_mail')->with([
            "etudiant"=>$this->etudiant
        ]);
    }
}
