<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "type",
        "localisation",
        "phone",
        "email",
        "is_active",
        "password",
        "email_verification_code",
        "email_verified_at"
    ];
}
