<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class omra extends Model
{
    use HasFactory;

    protected $table = 'omras';

    protected $fillable = [
        'nom',
        'type',
        'depart',
        'retour',
        'place',
        'saison',
        'compagne',
        'photo',
        'hotel_id',
    ];
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'omra_hotels', 'omraID', 'hotelID');
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'omra');
    }

   // Omra.php
public function reservations()
{
    return $this->hasMany(ReservationOmra::class, 'omraID'); // Use 'omraID' instead of 'omra_id'
}


}
