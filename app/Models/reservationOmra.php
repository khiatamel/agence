<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservationOmra extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'numero',
        'passeport',
        'photo',
        'age',
        'group_name',
        'omraID',
        'user_id',
        'hotel',
        // Add other attributes here as needed
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
