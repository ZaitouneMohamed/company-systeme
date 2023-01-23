<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email_pro extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'mot_de_passe',
        'user_id',
        'lien'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
