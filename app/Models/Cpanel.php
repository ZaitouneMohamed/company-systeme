<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpanel extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'mot_passe_email',
        'user_id',
        'mot_de_passe',
        'cpanel_link'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
