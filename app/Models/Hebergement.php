<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory;

    protected $fillable = [
        'prix_GB',
        'lieu',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
