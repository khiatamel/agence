<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'condition',
        'prix',
        'omra',
    ];

    // Relation avec le modèle Omra
    public function omra()
    {
        return $this->belongsTo(Omra::class, 'omra');
    }
}
