<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nom_domaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix',
        'lieu',
        'nom',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
