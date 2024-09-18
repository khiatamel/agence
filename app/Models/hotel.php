<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'adresse', 'desc', 'petit_dejeuner', 'demi_pension', 'pension_complete',
        'all_inclusive', 'all_insoft', 'vue_mer',
    ];


    // Relation avec les tarifs
    public function tarifs()
    {
        return $this->hasMany(TarifHotel::class, 'hotel', 'nom');
    }

    // Relation avec les photos
    public function photos()
    {
        return $this->hasMany(PhotoHotel::class, 'hotel', 'nom');
    }
    public function omras()
    {
        return $this->belongsToMany(Omra::class, 'omra_hotels', 'hotelID', 'omraID');
    }
}
