<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable = ['description','traitement','iduser'];

    public function user()
    {
        return $this->belongsTo(User::class,'iduser');
    }

   
}
