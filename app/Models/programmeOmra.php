<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programmeOmra extends Model
{
    // Specify the table name if it's not the plural form of the model name
    protected $table = 'programme_omras';

    // Specify the fillable fields
    protected $fillable = [
        'départ', 'retour', 'heurD', 'heurR', 'nvD', 'nvR', 'parcourtD', 'parcourtR', 'compagne',
    ];
}
