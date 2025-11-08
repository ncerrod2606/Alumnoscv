@extends('app.bootstrap.template')

@section('title', 'Listado de alumnos')

@section('content')
<h1 class="mb-4 text-center">Listado de Alumnos</h1>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre completo</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Nota media</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>
                    @if($alumno->fotografia)
                        <img src="{{ route('alumno.fotografia', $alumno->id) }}" 
                             alt="{{ $alumno->nombre }}" 
                             class="rounded-circle shadow-sm" 
                             width="60" height="60" 
                             style="object-fit: cover;">
                    @else
                        <img src="{{ url('assets/img/default-avatar.png') }}" 
                             class="rounded-circle shadow-sm" 
                             width="60" height="60" 
                             alt="Sin foto">
                    @endif
                </td>
                <td>{{ $alumno->nombre }} {{ $alumno->apellidos }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ $alumno->nota_media }}</td>
                <td>
                    <a href="{{ route('alumno.show', $alumno->id) }}" class="btn btn-success btn-sm">Ver</a>
                    <a href="{{ route('alumno.edit', $alumno->id) }}" class="btn btn-warning text-white btn-sm">Editar</a>

                    <!-- Botón eliminar con modal único -->
                    <button type="button"
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEliminar"
                            data-nombre="{{ $alumno->nombre }} {{ $alumno->apellidos }}"
                            data-url="{{ route('alumno.destroy', $alumno->id) }}">
                        Eliminar
                    </button>

                    @if($alumno->cv)
                        <a href="{{ route('alumno.cv', $alumno->id) }}" target="_blank" class="btn btn-outline-info btn-sm">
                            Ver CV
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="table-light">
            <tr>
                <th colspan="6">Número total de alumnos:</th>
                <th>{{ count($alumnos) }}</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- ================= MODAL ÚNICO DE ELIMINACIÓN ================= -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalEliminarLabel">Confirmar eliminación</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p id="modalEliminarContent">¿Seguro que deseas eliminar a este alumno?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form id="formEliminar" action="" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Script inline mínimo solo para actualizar modal -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalEliminar = document.getElementById('modalEliminar');
    modalEliminar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const nombre = button.getAttribute('data-nombre');
        const url = button.getAttribute('data-url');

        // Actualizar contenido del modal
        modalEliminar.querySelector('#modalEliminarContent').textContent = `¿Seguro que deseas eliminar a ${nombre}?`;

        // Actualizar acción del formulario
        modalEliminar.querySelector('#formEliminar').setAttribute('action', url);
    });
});
</script>
<!-- ================= FIN MODAL ================= -->

@endsection
