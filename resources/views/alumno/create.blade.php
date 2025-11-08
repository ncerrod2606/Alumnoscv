@extends('app.bootstrap.template')

@section('title', 'Añadir Alumno')

@section('content')
<h1 class="mb-4">Nuevo Alumno</h1>

<form method="POST" action="{{ route('alumno.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
        </div>

        <div class="col-md-6">
            <label class="form-label">Nota media</label>
            <input type="number" step="0.01" min="0" max="10" name="nota_media" class="form-control" value="{{ old('nota_media') }}">
        </div>

        <div class="col-md-12">
            <label class="form-label">Experiencia</label>
            <textarea name="experiencia" class="form-control" rows="3">{{ old('experiencia') }}</textarea>
        </div>

        <div class="col-md-12">
            <label class="form-label">Formación</label>
            <textarea name="formacion" class="form-control" rows="3">{{ old('formacion') }}</textarea>
        </div>

        <div class="col-md-12">
            <label class="form-label">Habilidades</label>
            <textarea name="habilidades" class="form-control" rows="3">{{ old('habilidades') }}</textarea>
        </div>

        <div class="col-md-6">
            <label class="form-label">Fotografía</label>
            <input type="file" name="fotografia" class="form-control" accept="image/*">
        </div>

        <div class="col-md-6">
            <label class="form-label">CV (PDF/DOC)</label>
            <input type="file" name="cv" class="form-control" accept=".pdf,.doc,.docx">
        </div>

    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-success">Guardar Alumno</button>
        <a href="{{ route('alumno.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </div>
</form>
@endsection

