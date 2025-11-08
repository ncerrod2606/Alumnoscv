<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AlumnoController extends Controller
{
    public function index(): View
    {
        $alumnos = Alumno::all();
        return view('alumno.index', ['alumnos' => $alumnos]);
    }

    public function create(): View
    {
        return view('alumno.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|unique:alumnos,correo',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'experiencia' => 'nullable|string',
            'formacion' => 'nullable|string',
            'habilidades' => 'nullable|string',
            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $alumno = new Alumno($request->all());
        $result = false;
        $txtmessage = '';

        try {
            $result = $alumno->save();
            $txtmessage = 'El alumno ha sido añadido correctamente.';

            if($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
                try {
                    $ruta = $this->uploadFoto($request, $alumno);
                    if ($ruta) {
                        $alumno->fotografia = $ruta;
                        $alumno->save();
                        $txtmessage .= ' Fotografía guardada.';
                    }
                } catch (\Exception $e) {
                    $txtmessage .= ' Error al guardar la fotografía.';
                }
            }

            if($request->hasFile('cv') && $request->file('cv')->isValid()) {
                try {
                    $ruta = $this->uploadCv($request, $alumno);
                    if ($ruta) {
                        $alumno->cv = $ruta;
                        $alumno->save();
                        $txtmessage .= ' CV guardado.';
                    }
                } catch (\Exception $e) {
                    $txtmessage .= ' Error al guardar el CV.';
                }
            }

        } catch (UniqueConstraintViolationException $e) {
            $txtmessage = 'Error: correo duplicado.';
        } catch (QueryException $e) {
            $txtmessage = 'Error en la base de datos.';
        } catch (\Exception $e) {
            $txtmessage = 'Error inesperado al guardar el alumno.';
        }

        if ($result) {
            return redirect()->route('alumno.index')->with('mensajeTexto', $txtmessage);
        } else {
            return back()->withInput()->withErrors(['mensajeTexto' => $txtmessage]);
        }
    }

    public function show(Alumno $alumno): View
    {
        return view('alumno.show', ['alumno' => $alumno]);
    }

    public function edit(Alumno $alumno): View
    {
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    public function update(Request $request, Alumno $alumno): RedirectResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|unique:alumnos,correo,' . $alumno->id,
            'telefono' => 'nullable|string|max:20',
            'nota_media' => 'nullable|numeric|min:0|max:10',
            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $result = false;
        $alumno->fill($request->except(['fotografia', 'cv']));
        $txtmessage = '';

        try {
            $result = $alumno->save();
            $txtmessage = 'El alumno ha sido actualizado.';

            if($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
                try {
                    // Eliminar foto anterior si existe
                    if($alumno->fotografia) {
                        Storage::disk('public')->delete($alumno->fotografia);
                    }
                    // Subir nueva foto
                    $ruta = $this->uploadFoto($request, $alumno);
                    if ($ruta) {
                        $alumno->fotografia = $ruta;
                        $alumno->save();
                        $txtmessage .= ' Fotografía actualizada.';
                    }
                } catch (\Exception $e) {
                    $txtmessage .= ' Error al actualizar la fotografía.';
                }
            }

            if($request->hasFile('cv') && $request->file('cv')->isValid()) {
                try {
                    // Eliminar CV anterior si existe
                    if($alumno->cv) {
                        Storage::disk('public')->delete($alumno->cv);
                    }
                    // Subir nuevo CV
                    $ruta = $this->uploadCv($request, $alumno);
                    if ($ruta) {
                        $alumno->cv = $ruta;
                        $alumno->save();
                        $txtmessage .= ' CV actualizado.';
                    }
                } catch (\Exception $e) {
                    $txtmessage .= ' Error al actualizar el CV.';
                }
            }

        } catch (UniqueConstraintViolationException $e) {
            $txtmessage = 'Error: correo duplicado.';
        } catch (QueryException $e) {
            $txtmessage = 'Error en la base de datos.';
        } catch (\Exception $e) {
            $txtmessage = 'Error inesperado al actualizar el alumno.';
        }

        if ($result) {
            return redirect()->route('alumno.index')->with('mensajeTexto', $txtmessage);
        } else {
            return back()->withInput()->withErrors(['mensajeTexto' => $txtmessage]);
        }
    }

    private function uploadFoto(Request $request, Alumno $alumno): string
    {
        $image = $request->file('fotografia');
        $name = $alumno->id . '_' . time() . '.' . $image->getClientOriginalExtension();
        $ruta = $image->storeAs('alumnos/fotos', $name, 'public');
        return $ruta;
    }

    private function uploadCv(Request $request, Alumno $alumno): string
    {
        $cv = $request->file('cv');
        $name = $alumno->id . '_' . time() . '.' . $cv->getClientOriginalExtension();
        $ruta = $cv->storeAs('alumnos/cv', $name, 'public');
        return $ruta;
    }

    public function destroy(Alumno $alumno): RedirectResponse
    {
        try {
            if($alumno->fotografia) {
                Storage::disk('public')->delete($alumno->fotografia);
            }
            if($alumno->cv) {
                Storage::disk('public')->delete($alumno->cv);
            }

            $result = $alumno->delete();
            $textMessage = 'El alumno se ha eliminado correctamente.';
        } catch (\Exception $e) {
            $textMessage = 'No se ha podido eliminar el alumno.';
            $result = false;
        }

        if ($result) {
            return redirect()->route('alumno.index')->with('mensajeTexto', $textMessage);
        } else {
            return back()->withInput()->withErrors(['mensajeTexto' => $textMessage]);
        }
    }
}