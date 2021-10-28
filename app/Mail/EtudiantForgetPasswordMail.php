<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EtudiantForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $etudiant_nom;
    public $reset_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($etudiant_nom,$reset_code)
    {
        $this->etudiant_nom=$etudiant_nom;
        $this->reset_code=$reset_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('pages.etudiant.emails.forget_password_mail')->with([
            "etudiant_nom"=>$this->etudiant_nom,
            "reset_code"=>$this->reset_code
        ]);
    }
}
