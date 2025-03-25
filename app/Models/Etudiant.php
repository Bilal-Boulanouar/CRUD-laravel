<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'genre',
        'niveau_etude',
        'image', // Ajout du champ image
    ];

    /**
     * Retourne l'URL de l'image ou l'image par défaut.
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . ($this->image ?? 'etudiants/default.jpg'));
    }
}
