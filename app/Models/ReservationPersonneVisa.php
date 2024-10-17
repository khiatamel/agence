<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPersonneVisa extends Model
{
    use HasFactory;

    protected $table = 'reservation_personnes_visas';
    protected $fillable = ['reservation_id', 'nom', 'status', 'prix'];

    public function reservation()
    {
        return $this->belongsTo(ReservationVisa::class, 'reservation_id');
    }

    // Define the relationship with ReservationFichierVisa (if applicable)
    public function files()
    {
        return $this->hasMany(ReservationFichierVisa::class, 'reservation_personne_id');
    }
    
    public function fichiers()
    {
        return $this->hasMany(ReservationFichierVisa::class, 'reservation_personne_id');
    }
}
