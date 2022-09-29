<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['type','matricule_etud','annee','filliere','ue','fiche','quittance','carte','valider','email'];

}
