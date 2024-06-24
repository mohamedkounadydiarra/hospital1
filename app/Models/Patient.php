<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prenom','email','datenaiss','telephone','pseudo','password','taille','poid'];

    public function dossier()
    {
        return $this->hasMany(Dossier::class,'iddossier');
    }

    public function consultaion()
    {
        return $this->hasMany(Consultation::class,'idconsultation');
    }
}
