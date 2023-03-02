<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
        'description',
        'razonsocial',
        'descripcion',
        'urlfoto',
        'urllogo',
        'visitas',
        'orden',
        'estado', // 0,1 APROBADO POR EL ROL ADMIN
        'publicacion', // 0, 1 PUBLICADO POR EL ROL EMPRESA
        'ruta_id',
        'user_id'
    ];
    public function Ruta(){
        return $this->belongsTo("App\Models\Ruta");
    }
    public function User(){
        return $this->belongsTo("App\Models\User");
    }
}
