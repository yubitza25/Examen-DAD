@extends('plantilla.app')  <!-- Extiende la plantilla base llamada 'app' para usar su estructura. -->
@section('contenido')  <!-- Inicia la sección de contenido que reemplazará la sección correspondiente en la plantilla base. -->

<!-- CONTENIDO -->
<!-- Contenido principal -->
<div class="content">  <!-- Div contenedor para el contenido principal. -->
    <div class="container-fluid">  <!-- Contenedor fluido para permitir que el contenido ocupe todo el ancho disponible. -->
        <div class="row">  <!-- Inicia una fila para organizar el contenido. -->
            <div class="col-lg-12">  <!-- Columna que ocupará todo el ancho en dispositivos grandes. -->
                <div class="card">  <!-- Tarjeta para agrupar contenido relacionado. -->
                    <div class="card-header">  <!-- Encabezado de la tarjeta. -->
                        <h5 class="m-0">SIGNOS  <!-- Título de la sección. -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-action" onclick="nuevo()">
                                <i class="fas fa-file"></i> Nuevo  <!-- Ícono de archivo junto al texto "Nuevo". -->
                            </button>
                            <a href="" class="btn btn-success">  <!-- Botón para descargar un archivo CSV. -->
                                <i class="fas fa-file-csv"></i> CSV  <!-- Ícono de CSV junto al texto. -->
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">  <!-- Cuerpo de la tarjeta donde se coloca el contenido. -->
                        <form action="/" method="get">  <!-- Formulario que realiza una búsqueda. Enviará una solicitud GET a la raíz del sitio. -->
                            <div class="input-group">  <!-- Agrupación de entrada y botón. -->
                                <input name="texto" type="text" class="form-control" value="">  <!-- Campo de entrada de texto para buscar. -->
                                <div class="input-group-append">  <!-- Agrupación adicional para el botón de búsqueda. -->
                                    <button type="submit" class="btn btn-info">  <!-- Botón para enviar la búsqueda. -->
                                        <i class="fas fa-search"></i> Buscar  <!-- Ícono de lupa junto al texto "Buscar". -->
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="alert alert-info alert-dismissible fade show mt-2">  <!-- Alerta informativa que se puede cerrar. -->
                            <span class="alert-icon"><i class="fa fa-info"></i></span>  <!-- Ícono de información en la alerta. -->
                            <span class="alert-text">Mensaje del sistema</span>  <!-- Texto del mensaje de alerta. -->
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <!-- Botón para cerrar la alerta. -->
                                <span aria-hidden="true">&times;</span>  <!-- Símbolo de cierre. -->
                            </button>
                        </div>

                        <div class="alert alert-secondary mt-2" role="alert">  <!-- Alerta secundaria para mostrar que no hay registros. -->
                            No hay registros para mostrar  <!-- Mensaje que indica la ausencia de registros. -->
                        </div>

                        <div class="mt-2 table-responsive">  <!-- Sección que hace que la tabla sea responsive. -->
                            <table class="table table-striped table-bordered table-hover table-sm">  <!-- Tabla con estilos Bootstrap. -->
                                <thead>  <!-- Encabezado de la tabla. -->
                                <tr>
                                    <th style="width: 20%">Opciones</th>  <!-- Columna para opciones de editar y eliminar. -->
                                    <th style="width: 80%">Nombre</th>  <!-- Columna para mostrar el nombre. -->
                                    <th style="width: 20%">Descripción</th>  <!-- Nueva columna para la descripción. -->
                                    <th style="width: 20%">Fecha de Inicio</th>  <!-- Nueva columna para la fecha de inicio. -->
                                    <th style="width: 20%">Fecha de Fin</th>  <!-- Nueva columna para la fecha de fin. -->
                                    <th style="width: 20%">Costo</th>  <!-- Nueva columna para el costo. -->
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($eventos as $evento)
                                    <tr>
                                        <td>
                                            <!-- Botón para editar el evento -->
                                            <button class="btn btn-warning btn-sm" onclick="editar({{ $evento->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Botón para eliminar el evento -->
                                            <button type="button" data-toggle="modal" data-target="#modal-eliminar-{{ $evento->id }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                        <td>{{ $evento->nombre }}</td>
                                        <td>{{ $evento->descripcion }}</td>
                                        <td>{{ $evento->fecha_inicio }}</td>
                                        <td>{{ $evento->fecha_fin }}</td>
                                        <td>{{ $evento->costo }}</td>
                                    </tr>
                                    @include('evento.delete', ['evento' => $evento]) <!-- Suponiendo que tienes un modal de eliminar -->
                                @empty
                                    <tr>
                                        <td colspan="6">No hay eventos registrados</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            </table>  <!-- Fin de la tabla. -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- MODAL NUEVO EVENTO -->
<div class="modal fade" id="modal-action" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Nuevo Evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('evento.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de Fin</label>
                        <input type="date" class="form-control" name="fecha_fin" required>
                    </div>
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input type="number" class="form-control" name="costo" required step="0.01">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL NUEVO EVENTO -->

<!-- FIN TABLA -->

<!-- FIN CONTENIDO -->

@endsection  <!-- Fin de la sección de contenido. -->

@push('scripts')
<script>
    $('#liAlmacen').addClass("menu-open");      
    $('#liEvento').addClass("active");
    $('#aAlmacen').addClass("active");

    function nuevo(){
    $('#modal-action').modal("show");  // Muestra el modal
}

function editar(id){
    $.ajax({
        method: 'get',
        url: `{{ url('evento') }}/${id}/edit`,
        success: function(res){
            $('#modal-action').find('.modal-body').html(res);
            $('#modal-action').modal("show");              
        }
    });
}


</script>
@endpush
