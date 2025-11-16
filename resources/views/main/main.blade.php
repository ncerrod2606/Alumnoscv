@extends('app.bootstrap.template')

@section('title', 'Directorio de Estudiantes')

@section('content')
<div class="container-fluid py-5">
    <!-- Encabezado con gradiente profesional -->
    <div class="page-header mb-5">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="display-5 fw-bold text-primary mb-2">Directorio de Estudiantes</h1>
                <p class="text-muted lead mb-0">Explora el talento y las competencias de nuestros estudiantes</p>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 fs-6">
                    {{ count($alumnos) }} estudiante{{ count($alumnos) != 1 ? 's' : '' }} registrado{{ count($alumnos) != 1 ? 's' : '' }}
                </span>
            </div>
        </div>
        <hr class="mt-4 mb-0" style="border-top: 2px solid #e9ecef;">
    </div>

    @forelse($alumnos as $alumno)
        @if($loop->first || $loop->index % 3 == 0)
            <div class="row g-4 mb-4">
        @endif

        <div class="col-lg-4 col-md-6">
            <div class="card student-card border-0 h-100 shadow-hover">
                <!-- Imagen del estudiante -->
                <div class="student-image-wrapper position-relative overflow-hidden">
                    @if($alumno->fotografia)
                        <img src="{{ route('alumno.fotografia', $alumno->id) }}" 
                             class="card-img-top student-photo" 
                             alt="{{ $alumno->nombre }} {{ $alumno->apellidos }}">
                    @else
                        <div class="default-avatar d-flex align-items-center justify-content-center bg-gradient-primary">
                            <span class="avatar-initials display-4 fw-bold text-white">
                                {{ strtoupper(substr($alumno->nombre, 0, 1)) }}{{ strtoupper(substr($alumno->apellidos, 0, 1)) }}
                            </span>
                        </div>
                    @endif
                    <div class="image-overlay"></div>
                </div>

                <div class="card-body p-4">
                    <!-- Nombre del estudiante -->
                    <h5 class="card-title fw-bold mb-2 text-dark">
                        {{ $alumno->nombre }} {{ $alumno->apellidos }}
                    </h5>

                    <!-- Correo electrónico -->
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                        <a href="mailto:{{ $alumno->correo }}" class="text-decoration-none text-muted small">
                            {{ $alumno->correo }}
                        </a>
                    </div>

                    <!-- Experiencia resumida -->
                    @if($alumno->experiencia)
                        <div class="experience-section mb-3">
                            <p class="card-text text-secondary small mb-0 lh-base">
                                <i class="bi bi-briefcase-fill text-primary me-2"></i>
                                {{ Str::limit($alumno->experiencia, 100, '...') }}
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Footer con acciones -->
                <div class="card-footer bg-transparent border-top-0 px-4 pb-4 pt-0">
                    <div class="d-flex gap-2">
                        <a href="{{ route('alumno.show', $alumno->id) }}" 
                           class="btn btn-primary flex-grow-1 btn-action">
                            <i class="bi bi-person-lines-fill me-1"></i>
                            Ver Perfil
                        </a>

                        @if($alumno->cv)
                            <a href="{{ route('alumno.cv', $alumno->id) }}" 
                               target="_blank" 
                               class="btn btn-outline-primary btn-action"
                               title="Descargar CV">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if($loop->last || ($loop->index + 1) % 3 == 0)
            </div>
        @endif

    @empty
        <div class="row">
            <div class="col-12">
                <div class="empty-state text-center py-5">
                    <div class="empty-icon mb-4">
                        <i class="bi bi-people display-1 text-muted opacity-50"></i>
                    </div>
                    <h3 class="text-muted mb-3">No hay estudiantes registrados</h3>
                    <p class="text-secondary mb-4">El directorio está vacío. Los estudiantes aparecerán aquí una vez se registren.</p>
                </div>
            </div>
        </div>
    @endforelse
</div>

<style>
    /* Variables CSS para personalización */
    :root {
        --primary-color: #0d6efd;
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --card-shadow: 0 2px 8px rgba(0,0,0,0.08);
        --card-shadow-hover: 0 8px 24px rgba(0,0,0,0.15);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Estilos del contenedor principal */
    .page-header {
        position: relative;
        padding-bottom: 1.5rem;
    }

    .page-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100px;
        height: 3px;
        background: var(--primary-gradient);
        border-radius: 2px;
    }

    /* Tarjetas de estudiantes */
    .student-card {
        transition: var(--transition);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        background: white;
    }

    .student-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--card-shadow-hover);
    }

    /* Contenedor de imagen */
    .student-image-wrapper {
        position: relative;
        height: 280px;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .student-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .student-card:hover .student-photo {
        transform: scale(1.05);
    }

    /* Avatar por defecto */
    .default-avatar {
        width: 100%;
        height: 100%;
        background: var(--primary-gradient);
    }

    .avatar-initials {
        font-size: 4rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    /* Overlay de imagen */
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.05) 100%);
        opacity: 0;
        transition: var(--transition);
    }

    .student-card:hover .image-overlay {
        opacity: 1;
    }

    /* Sección de experiencia */
    .experience-section {
        border-left: 3px solid var(--primary-color);
        padding-left: 12px;
        margin-left: 4px;
    }

    /* Botones de acción */
    .btn-action {
        font-weight: 500;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        transition: var(--transition);
        font-size: 0.9rem;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    /* Estado vacío */
    .empty-state {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 16px;
        padding: 3rem;
        margin: 2rem 0;
    }

    .empty-icon {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Badge personalizado */
    .badge.bg-primary.bg-opacity-10 {
        border-radius: 20px;
        font-weight: 500;
        letter-spacing: 0.3px;
    }

    /* Gradiente de fondo para primary */
    .bg-gradient-primary {
        background: var(--primary-gradient);
    }

    /* Iconos Bootstrap */
    .bi {
        font-size: inherit;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header .col-md-4 {
            margin-top: 1rem;
        }

        .student-image-wrapper {
            height: 240px;
        }

        .display-5 {
            font-size: 2rem;
        }

        .btn-action {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
        }
    }

    /* Mejoras de accesibilidad */
    .card-footer a:focus,
    .card-body a:focus {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }

    /* Transiciones suaves para hover */
    .shadow-hover {
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
</style>
@endsection