@extends('layout/plantilla');
@section('tituloPagina', 'Crud con Laravel 8');
@section('contenido')


    <div class="card">
    <div class="card-header">
        Crud con Laravel 8
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @if($mensaje = Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ $mensaje }}
                </div>
                @endif
                
            </div>
        </div>
        <h5 class="card-title text-center">Listado de personas en el sistema</h5>
        <p>
            <a href="{{ route('personas.create') }}" class="btn btn-primary">Agregar nueva persona <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</a>
        </p>
        <hr>      
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($datos as $item)
                        <tr>
                            <td>{{ $item->paterno }}</td>
                            <td>{{ $item->materno }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->fecha_nacimiento }}</td>     
                            <td>
                                <form action="{{ route('personas.edit', $item->id) }}" method="GET">
                                    <button class="btn btn-warning btn-sm">
                                        Editar
                                    </button>
                                </form>
                            </td>                       
                            <td>
                                <form action="{{ route('personas.show', $item->id) }}" method="GET">
                                    <button class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        {{ $datos->links() }}
                    </div>
                </div>
            </div>
        </p>
        
    </div>
    </div>
    
@endsection
