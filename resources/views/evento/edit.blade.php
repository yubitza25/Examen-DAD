<!-- evento/edit.blade.php -->
@csrf
@method('PUT') <!-- Método para indicar que es una actualización -->
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ $evento->nombre }}" required>
</div>
<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea class="form-control" name="descripcion" required>{{ $evento->descripcion }}</textarea>
</div>
<div class="form-group">
    <label for="fecha_inicio">Fecha de Inicio</label>
    <input type="date" class="form-control" name="fecha_inicio" value="{{ $evento->fecha_inicio }}" required>
</div>
<div class="form-group">
    <label for="fecha_fin">Fecha de Fin</label>
    <input type="date" class="form-control" name="fecha_fin" value="{{ $evento->fecha_fin }}" required>
</div>
<div class="form-group">
    <label for="costo">Costo</label>
    <input type="number" class="form-control" name="costo" value="{{ $evento->costo }}" required step="0.01">
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
