@extends('app.bootstrap.template')

@section('title', 'Acerca del Gestor de Alumnos')

@section('content')
<div class="container text-center">
    <h1 class="mb-4">Acerca del Gestor de Alumnos</h1>
    <p class="lead">
        Esta aplicación permite registrar alumnos, subir su foto y su currículum en formato PDF.
        Desde la lista principal, puedes ver la información del alumno y descargar o visualizar su CV directamente.
    </p>

    <hr class="my-4">

    <p>
        <strong>Desarrollado con:</strong> Laravel 11, PHP 8, Bootstrap 5 y MySQL.  
    </p>
    <p>Proyecto adaptado a partir de la Barber Shop App 🧑‍💻</p>
</div>
@endsection
