<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'Reste',
        'fournisseur_id',
        'benefice',
        'avance',
        'mode',
        'suivi_id'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(fournisseur::class);
    }

    public function suivi()
    {
        return $this->belongsTo(suivi::class);
    }
}
