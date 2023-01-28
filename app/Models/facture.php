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
        'user_id',
        'suivi_id'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(fournisseur::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suivi()
    {
        return $this->belongsTo(suivi::class);
    }
}
