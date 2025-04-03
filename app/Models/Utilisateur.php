<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Utilisateur extends Model
{
    protected $fillable = [
        'pseudo',
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'code_postal',
        'ville',
        'actif'
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_utilisateur');
    }
}
