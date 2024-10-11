<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeVisa extends Model
{
    use HasFactory;

     protected $fillable = ['destination', 'type'];

    // Relation inverse avec Visa
    public function visa()
    {
        return $this->belongsTo(Visa::class, 'destination', 'destination');
    }

    // Relation avec DossierVisa
    public function dossierVisas()
    {
        return $this->hasMany(DossierVisa::class, 'type', 'type');
    }
}
