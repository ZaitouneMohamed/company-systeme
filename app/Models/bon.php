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
        'user_id',
        'benefice',
        'avance',
        'mode',
        'suivi_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function suivi()
    {
        return $this->belongsTo(suivi::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(fournisseur::class);
    }
}
