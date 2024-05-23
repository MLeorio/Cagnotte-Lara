<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'fond',
        'due_date'
    ];

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function articles() : HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function cagnottes() : HasMany
    {
        return $this->hasMany(Cagnotte::class);
    }
}
