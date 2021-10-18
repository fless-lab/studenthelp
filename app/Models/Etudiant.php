<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "prenom",
        "email",
        "matricule",
        "is_active",
        "password",
        "email_verification_code",
        "email_verified_at"
    ];
}
