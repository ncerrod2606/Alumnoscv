@extends('app.bootstrap.template')

@section('title', 'Sobre el Proyecto')

@section('content')
<div class="about-container py-5">
    <!-- Hero Section -->
    <div class="hero-section text-center mb-5">
        <div class="container">
            <div class="hero-icon mb-4">
                <i class="bi bi-mortarboard-fill display-1 text-primary"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3 text-gradient">Sistema de Gestión de Estudiantes</h1>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">
                Plataforma integral para la administración eficiente de perfiles estudiantiles, 
                facilitando el acceso a información académica y profesional de manera centralizada.
            </p>
        </div>
    </div>

    <div class="container">
        <!-- Características Principales -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-person-badge display-4 text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Gestión de Perfiles</h4>
                    <p class="text-muted mb-0">
                        Registro completo de información estudiantil con fotografías 
                        y datos de contacto actualizados.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-file-earmark-pdf display-4 text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Repositorio de CV</h4>
                    <p class="text-muted mb-0">
                        Almacenamiento seguro de currículums en formato PDF con 
                        acceso rápido y visualización integrada.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-search display-4 text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Búsqueda Eficiente</h4>
                    <p class="text-muted mb-0">
                        Directorio intuitivo que permite explorar y consultar 
                        perfiles de manera ágil y organizada.
                    </p>
                </div>
            </div>
        </div>

        <!-- Funcionalidades Clave -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="content-section">
                    <h2 class="fw-bold mb-4">
                        <i class="bi bi-star-fill text-warning me-2"></i>
                        Funcionalidades Clave
                    </h2>
                    <ul class="feature-list list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <strong>Registro Multimedia:</strong> Captura de fotografías y documentación profesional
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <strong>Visualización Centralizada:</strong> Acceso inmediato a información completa del estudiante
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <strong>Descarga Directa:</strong> Obtención de currículums sin pasos intermedios
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <strong>Interfaz Responsive:</strong> Diseño adaptable a cualquier dispositivo
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <strong>Gestión Simplificada:</strong> Panel administrativo intuitivo y eficiente
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="tech-illustration p-4 bg-light rounded-4">
                    <h3 class="fw-bold mb-4 text-center">Casos de Uso</h3>
                    <div class="use-case-item mb-3 p-3 bg-white rounded-3 shadow-sm">
                        <i class="bi bi-building text-primary me-2"></i>
                        <strong>Instituciones Educativas:</strong> Control académico y seguimiento estudiantil
                    </div>
                    <div class="use-case-item mb-3 p-3 bg-white rounded-3 shadow-sm">
                        <i class="bi bi-briefcase text-success me-2"></i>
                        <strong>Departamentos de Empleo:</strong> Bolsa de talento y gestión de candidatos
                    </div>
                    <div class="use-case-item p-3 bg-white rounded-3 shadow-sm">
                        <i class="bi bi-graph-up text-info me-2"></i>
                        <strong>Centros de Formación:</strong> Portafolio profesional de egresados
                    </div>
                </div>
            </div>
        </div>

        <!-- Stack Tecnológico -->
        <div class="tech-stack-section text-center py-5">
            <h2 class="fw-bold mb-5">
                <i class="bi bi-code-slash text-primary me-2"></i>
                Stack Tecnológico
            </h2>
            
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="tech-badge p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-filetype-php display-5 text-primary mb-3"></i>
                        <h5 class="fw-bold">PHP 8</h5>
                        <p class="text-muted small mb-0">Lenguaje Backend</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="tech-badge p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-diagram-3-fill display-5 text-danger mb-3"></i>
                        <h5 class="fw-bold">Laravel 11</h5>
                        <p class="text-muted small mb-0">Framework MVC</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="tech-badge p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-bootstrap-fill display-5 text-purple mb-3"></i>
                        <h5 class="fw-bold">Bootstrap 5</h5>
                        <p class="text-muted small mb-0">Framework CSS</p>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="tech-badge p-4 bg-white rounded-4 shadow-sm h-100">
                        <i class="bi bi-database-fill display-5 text-warning mb-3"></i>
                        <h5 class="fw-bold">MySQL</h5>
                        <p class="text-muted small mb-0">Base de Datos</p>
                    </div>
                </div>
            </div>

            <!-- Arquitectura -->
            <div class="architecture-info mt-5 p-4 bg-gradient-light rounded-4">
                <h4 class="fw-bold mb-3">Arquitectura del Sistema</h4>
                <p class="text-muted mb-0">
                    Desarrollo basado en el patrón <strong>MVC (Model-View-Controller)</strong>, 
                    implementando las mejores prácticas de Laravel para garantizar escalabilidad, 
                    mantenibilidad y seguridad en el manejo de datos sensibles.
                </p>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="cta-section text-center py-5 mt-4">
            <div class="cta-content p-5 bg-gradient-primary rounded-4 text-white">
                <h3 class="fw-bold mb-3">¿Listo para comenzar?</h3>
                <p class="lead mb-4 opacity-90">
                    Explora el directorio de estudiantes y descubre todo el potencial de la plataforma.
                </p>
                <a href="{{ route('main') }}" class="btn btn-light btn-lg px-5 fw-bold">
                    <i class="bi bi-people-fill me-2"></i>
                    Ver Directorio de Estudiantes 
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Variables de diseño */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --light-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    }

    /* Hero Section */
    .about-container {
        background: linear-gradient(to bottom, #f8f9fa 0%, #ffffff 100%);
        min-height: 100vh;
    }

    .hero-section {
        padding: 2rem 0;
    }

    .hero-icon {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Feature Cards */
    .feature-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }

    .feature-icon {
        transition: transform 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.1);
    }

    /* Content Section */
    .content-section h2 {
        position: relative;
        display: inline-block;
    }

    .feature-list li {
        padding-left: 10px;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    /* Tech Illustration */
    .tech-illustration {
        border: 2px solid #e9ecef;
    }

    .use-case-item {
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }

    .use-case-item:hover {
        transform: translateX(10px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Tech Stack */
    .tech-stack-section {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 24px;
        margin: 2rem 0;
    }

    .tech-badge {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .tech-badge:hover {
        transform: translateY(-10px) scale(1.05);
        border-color: #667eea;
        box-shadow: 0 12px 28px rgba(102, 126, 234, 0.3);
    }

    .tech-badge i {
        transition: transform 0.3s ease;
    }

    .tech-badge:hover i {
        transform: rotate(10deg) scale(1.1);
    }

    .text-purple {
        color: #7952b3;
    }

    /* Architecture Info */
    .bg-gradient-light {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    }

    .architecture-info {
        border: 2px solid rgba(0,0,0,0.05);
    }

    /* CTA Section */
    .bg-gradient-primary {
        background: var(--primary-gradient);
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
    }

    .cta-content {
        position: relative;
        overflow: hidden;
    }

    .cta-content::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: ripple 15s infinite;
    }

    @keyframes ripple {
        0% { transform: translate(0, 0); }
        50% { transform: translate(-20%, -20%); }
        100% { transform: translate(0, 0); }
    }

    .cta-content .btn-light:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .hero-section .lead {
            font-size: 1rem;
        }

        .tech-badge {
            margin-bottom: 1rem;
        }

        .feature-list li {
            font-size: 0.95rem;
        }

        .cta-content {
            padding: 2rem !important;
        }
    }

    /* Smooth transitions */
    * {
        transition: background-color 0.3s ease;
    }

    /* Iconos Bootstrap */
    .bi {
        vertical-align: middle;
    }
</style>
@endsection