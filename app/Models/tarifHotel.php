<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarifHotel extends Model
{
    use HasFactory;

    protected $fillable = ['condition', 'prix', 'hotel'];

    // Relation inverse avec Hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel', 'nom');
    }
}
