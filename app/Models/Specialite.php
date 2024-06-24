<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    protected $fillable = ['nomspecialite','photo'];

    public function patient()
    {
        return $this->hasMany(Patient::class,'idpatient');
    }
}
