<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable = ['description','traitement','idpatient','iddocteur'];

    public function docteur()
    {
        return $this->belongsTo(Docteur::class,'iddocteur');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class,'idpatient');
    }
}
