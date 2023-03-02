<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ruta extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'nombre',
        'descripcion',
        'urlfoto',
        'visitas',
        'orden'
    ];

    public function Empresa(){
        return $this->hasMany("App\Models\Empresa");
    }

    public function Lugar(){
        return $this->hasMany("App\Models\Lugar");
    }
}
