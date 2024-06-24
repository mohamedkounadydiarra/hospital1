<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    use HasFactory;
    protected $fillable = ['datedisponible','jour','iddocteur'];

    public function docteur()
    {
        return $this->belongsTo(Docteur::class,'iddocteur');
    }

    public function consultation()
    {
        return $this->hasMany(Consultation::class,'idconsultation');
    }
}
