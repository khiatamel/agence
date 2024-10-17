<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservationVisa extends Model
{
    use HasFactory;

    protected $table = 'reservations_visas'; // Ensure this is correct
    protected $fillable = ['user_id','demande_visa_id', 'total_personnes'];

     // Define the relationship with ReservationPersonneVisa
     public function reservationPersonnes()
     {
         return $this->hasMany(ReservationPersonneVisa::class, 'reservation_id');
     }
 
     // Define the relationship with DemandeVisa (if needed)
     public function demandeVisa()
     {
         return $this->belongsTo(DemandeVisa::class, 'demande_visa_id');
     }
    public function personnes()
    {
        return $this->hasMany(ReservationPersonneVisa::class, 'reservation_id');
    }
}
