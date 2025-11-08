@extends('app.bootstrap.template')

@section('title', 'Editar Alumno')

@section('content')
<h1 class="mb-4">Editar Alumno</h1>

<form method="POST" action="{{ route('alumno.update', $alumno->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre) }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $alumno->apellidos) }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $alumno->telefono) }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $alumno->correo) }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Nota media</label>
            <input type="number" step="0.01" min="0" max="10" name="nota_media" class="form-control" value="{{ old('nota_media', $alumno->nota_media) }}">
        </div>

        <div class="col-md-12">
            <label class="form-label">Experiencia</label>
            <textarea name="experiencia" class="form-control" rows="3">{{ old('experiencia', $alumno->experiencia) }}</textarea>
        </div>

        <div class="col-md-12">
            <label class="form-label">Formación</label>
            <textarea name="formacion" class="form-control" rows="3">{{ old('formacion', $alumno->formacion) }}</textarea>
        </div>

        <div class="col-md-12">
            <label class="form-label">Habilidades</label>
            <textarea name="habilidades" class="form-control" rows="3">{{ old('habilidades', $alumno->habilidades) }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Fotografía</label>

            <input type="file" name="fotografia" class="form-control" accept="image/*">
                        @if($alumno->fotografia)
                <div class="mb-2 mt-2 ">
                    <img src="{{ route('alumno.fotografia', $alumno->id) }}" 
                             alt="{{ $alumno->nombre }}" 
                             class="rounded-circle shadow-sm" 
                             width="60" height="60" 
                             style="object-fit: cover;">
                </div>
            @endif
        </div>

        <div class="col-md-6">
            <label class="form-label">CV (PDF/DOC)</label>

            <input type="file" name="cv" class="form-control" accept=".pdf,.doc,.docx">
            @if($alumno->cv)
                <div class="mb-2 mt-2">
                   <a href="{{ route('alumno.cv', $alumno->id) }}" target="_blank" class="btn btn-outline-success btn-sm">
                        Ver CV actual
                    </a>
                </div>
            @endif
        </div>

    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-warning text-white">Actualizar Alumno</button>
        <a href="{{ route('alumno.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </div>
</form>
@endsection
