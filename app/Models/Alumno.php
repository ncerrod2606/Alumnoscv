<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
    'nombre', 'apellidos', 'correo', 'telefono', 'fecha_nacimiento', 
    'nota_media', 'experiencia', 'formacion', 'habilidades',
    'fotografia', 'cv'
];

    public function getFotografiaUrlAttribute() {
        return $this->fotografia ? asset('storage/' . $this->fotografia) : null;
    }

    public function getCvUrlAttribute() {
        return $this->cv ? asset('storage/' . $this->cv) : null;
    }
}
