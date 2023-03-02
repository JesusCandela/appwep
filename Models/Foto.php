<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nombre',
        'descripcion',
        'urlfoto',        
        'tipo', // 0 = foto; 1 = foto 360 
        'orden',
        'lugar_id'
    ];
    public function Lugar(){
        return $this->belongsTo("App\Models\Lugar");
    }
}
