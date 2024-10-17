<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandeVisa extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_visa_id',
        'nb_adultes',
        'nb_enfants'
    ];

    // Relation avec TypeVisa
    public function typeVisa()
    {
        return $this->belongsTo(TypeVisa::class);
    }
}
