<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cagnotte extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'moyen_paye',
        'donnateur',
        'tel_donnateur'
    ];

    public function projet() : BelongsTo
    {
        return $this->belongsTo(Projet::class);
    }
}
