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
        'nom_societe',
        'Secteur',
        'categorie',
        'besoin'
    ];
    public function facture()
    {
        return $this->hasMany(facture::class);
    }

    public function bon()
    {
        return $this->hasMany(bon::class);
    }

}
