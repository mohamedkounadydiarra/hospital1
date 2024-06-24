<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docteur extends Model
{
    use HasFactory;
    protected $fillable = ['pseudo','password','telephone','email','photo','idspecialite'];

    public function specialite()
    {
        return $this->belongsTo(Specialite::class,'idspecialite');
    }

    public function planing()
    {
        return $this->hasMany(Planing::class,'idplaning');
    }

    public function dossier()
    {
        return $this->hasMany(Dossier::class,'iddossier');
    }
}
