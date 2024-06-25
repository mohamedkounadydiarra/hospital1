<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nom','prenom','photo','email','datenaiss','telephone','password','taille','poid','role','idspecialite'];

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

    public function consultaion()
    {
        return $this->hasMany(Consultation::class,'idconsultation');
    }
}
