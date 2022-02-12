@extends('layout/plantilla')

@section('tituloPagina', 'Crear nuevo registro')

@section('contenido')
<div class="card">
  <div class="card-header">
    Eliminar una persona
  </div>
  <div class="card-body">    
    <p class="card-text">
        <div class="alert alert-danger" role="alert">
            Estas seguro de eliminar este registro!!!

            <table class="table table-sm table-hover" style="background-color: white;">
                <thead>
                    <tr>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Nombre</th>
                        <th>Fecha nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $personas->paterno }}</td>
                        <td>{{ $personas->materno }}</td>
                        <td>{{ $personas->nombre }}</td>
                        <td>{{ $personas->fecha_nacimiento }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <form action="{{ route('personas.destroy', $personas->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('personas.index') }}" class="btn btn-info">Regresar</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </p>    
  </div>
</div>
@endsection