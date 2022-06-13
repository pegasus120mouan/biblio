<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
     protected $guarded = [];

    public function categorie()

    {
        return $this->belongsTo(Categorie::class);

    }

    public function auteurs(){
        return $this->belongsToMany(Auteur::class);
    }
}