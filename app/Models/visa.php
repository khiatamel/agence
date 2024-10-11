<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visa extends Model
{
    use HasFactory;
    
    protected $fillable = ['destination'];

    // Relation avec TypeVisa
    public function typeVisas()
    {
        return $this->hasMany(TypeVisa::class, 'destination', 'destination');
    }
}
