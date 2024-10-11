<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dossierVisa extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'dossier'];

    // Relation inverse avec TypeVisa
    public function typeVisa()
    {
        return $this->belongsTo(TypeVisa::class, 'type', 'type');
    }
}
