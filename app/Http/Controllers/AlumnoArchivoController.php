<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoArchivoController extends Controller
{
    /**
     * Mostrar la fotografía de un alumno.
     */
    public function fotografia($idalumno)
    {
        $alumno = Alumno::find($idalumno);

        if (!$alumno || !$alumno->fotografia || !file_exists(storage_path('app/public/' . $alumno->fotografia))) {
            return response()->file(base_path('public/assets/img/noimage.jpg'));
        }

        return response()->file(storage_path('app/public/' . $alumno->fotografia));
    }

    /**
     * Descargar el CV de un alumno.
     */
    public function cv($idalumno)
    {
        $alumno = Alumno::find($idalumno);

        if (!$alumno || !$alumno->cv || !file_exists(storage_path('app/public/' . $alumno->cv))) {
            abort(404, 'CV no encontrado');
        }

        // Mostrar el CV inline (en el navegador) en lugar de forzar la descarga
        return response()->file(storage_path('app/public/' . $alumno->cv));
    }
}
