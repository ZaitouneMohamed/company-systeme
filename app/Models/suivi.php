<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suivi extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'activite',
        'facture_id',
        'bon_id',
        'nom_societe',
        'Secteur',
        'categorie',
        'besoin'
    ];

    
}
