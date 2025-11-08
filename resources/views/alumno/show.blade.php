@extends('app.bootstrap.template')

@section('title', 'Detalle del Alumno')

@section('content')
<h1 class="mb-4">Detalle del Alumno</h1>


<div class="card shadow-sm">
    <div class="card-body row g-3">

        <div class="col-md-3 text-center">
            @if($alumno->fotografia)
                <img src="{{ route('alumno.fotografia', $alumno->id) }}" class="rounded shadow-sm w-100 mb-2">
            @else
                <img src="{{ url('assets/img/default-avatar.png') }}" class="rounded shadow-sm w-100 mb-2">
            @endif
        </div>

        <div class="col-md-9">
            <h3>{{ $alumno->nombre }} {{ $alumno->apellidos }}</h3>
            <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $alumno->telefono }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
            <p><strong>Nota media:</strong> {{ $alumno->nota_media }}</p>
            <p><strong>Experiencia:</strong> {{ $alumno->experiencia }}</p>
            <p><strong>Formación:</strong> {{ $alumno->formacion }}</p>
            <p><strong>Habilidades:</strong> {{ $alumno->habilidades }}</p>
            <p>
                <strong>CV:</strong>
                @if($alumno->cv)
                    <a href="{{ route('alumno.cv', $alumno->id) }}" target="_blank" class="btn btn-outline-info btn-sm">
                        Ver CV
                    </a>
                @else
                    <span class="text-muted">Sin CV</span>
                @endif
            </p>

            <div class="mt-3 d-flex flex-wrap gap-2">
                <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-warning text-white">Editar</a>
                <a href="{{ route('alumno.index') }}" class="btn btn-secondary">Volver</a>
                
                
            </div>
        </div>

    </div>
</div>

@endsection
