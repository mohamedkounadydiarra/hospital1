<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable = ['statut','idpatient','iddocteur','idplaning'];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'idpatient');
    }

    public function docteur()
    {
        return $this->hasMany(Docteur::class,'iddocteur');
    }

    public function planing()
    {
        return $this->belongsTo(Planing::class,'idplaning');
    }
}
