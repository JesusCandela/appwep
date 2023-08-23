<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'title',
        'description',
        'nombre',
        'descripcion',
        'urlfoto',
        'latitud',
        'longitud',
        'visitas',
        'orden',
        'estado',
        'likes',
        'ruta_id'
    ];
    public function Foto(){
        return $this->hasMany("App\Models\Foto");
    }
    public function Ruta(){
        return $this->belongsTo("App\Models\Ruta");
    }
}
