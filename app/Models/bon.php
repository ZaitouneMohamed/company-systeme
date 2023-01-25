<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bon extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'Reste',
        'fournisseur_id',
        'benefice',
        'avance',
        'mode',
    ];

    public function fournisseur()
    {
        return $this->belongsTo(fournisseur::class);
    }
}
