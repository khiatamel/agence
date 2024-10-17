<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationFichierVisa extends Model
{
    use HasFactory;
    
    protected $table = 'reservation_fichiers_visas';
    protected $fillable = ['reservation_personne_id', 'dossier_visa_id', 'fichier'];

}
