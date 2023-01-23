<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix_HT',
        'prix_TTC',
        'mode_payement',
        'nom',
        'déja_versé',
        'livraison',
    ];
}
