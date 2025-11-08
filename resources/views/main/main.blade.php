@extends('app.bootstrap.template')

@section('title', 'Listado de Alumnos')

@section('content')
<h1 class="mb-4 text-center">Listado de Alumnos</h1>

<div class="row">
    @forelse($alumnos as $alumno)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                {{-- Foto del alumno --}}
                @if($alumno->fotografia)
                    <img src="{{ route('alumno.fotografia', $alumno->id) }}" class="card-img-top" alt="{{ $alumno->nombre }}">
                @else
                    <img src="{{ url('assets/img/default-avatar.png') }}" class="card-img-top" alt="Sin foto">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h5>
                    <p class="card-text text-muted">{{ $alumno->correo }}</p>

                    @if($alumno->experiencia)
                        <p class="card-text">{{ Str::limit($alumno->experiencia, 80) }}</p>
                    @endif

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>

                        @if($alumno->cv)
                            <a href="{{ route('alumno.cv', $alumno->id) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                Ver CV
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">No hay alumnos registrados todavía.</p>
    @endforelse
</div>
@endsection
