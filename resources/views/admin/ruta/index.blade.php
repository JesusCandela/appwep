@extends('layouts.admin')

@section('content')
<head>
    <link href="{{ asset('CSS/styleempresaindex.css') }}" tipe="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"></head>
<body>
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <a href="{{route('ruta.create')}}" class="btn btn-success">NUEVA RUTA</a>
            <table class="table table-striped">
                <thead>
                    <th>Orden</th>
                    <th>Nombre</th>                
                    <th>Empresas</th>
                    <th>Lugares</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($rutas as $item)
                    <tr>
                        <td>{{$item->orden}}</td>
                        <td><b>{{$item->nombre}}</b></td>
                        <td>
                            <ul>
                            @forelse ($item->Empresa as $r)
                                <li><a href="{{ route('empresa.edit',$r->id)}}"><b>{{$r->razonsocial}}</b></a></li>
                            @empty
                            <li><span class="pending"><b>Pendiente</b> </span></li>                            @endforelse 
                            </ul>
                        </td>
                        <td>
                            <ol>
                            @forelse ($item->Lugar as $r)
                                <li><a href="{{ route('lugar.edit',$r->id)}}"><b>{{$r->nombre}}</b></a></li>
                            @empty
                                <li><span class="pending"><b>Pendiente</b> </span></li>
                            @endforelse 
                            @csrf
                            </ol>
                        </td>
                        <td>
                        <a href="{{ route('ruta.edit',$item->id)}}" class="btn btn-success edit-btn"><i class="fas fa-edit"></i> EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['empresas.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!! Form::button('<i class="fas fa-trash"></i> ELIMINAR',['type'=>'submit','class'=>'btn btn-danger delete-btn','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>

            </table>
    
        </div>
    </div>
</div> 
</body>
<style>
    /* styleempresaindex.css */

/* Títulos */
h1, h2, h3, h4, h5, h6 {
    font-weight: bold;
}

/* Texto normal */
p, td, th, li, a {
    font-size: 16px;
    line-height: 1.6;
    text-align: left; /* Alinea el texto a la izquierda */

}

/* Enlaces */
a {
    color: #007bff; /* Cambia el color del enlace */
    text-decoration: none; /* Elimina el subrayado predeterminado */
    text-align: left; /* Alinea el texto a la izquierda */

}

/* Enlaces al pasar el mouse por encima */
a:hover {
    color: #0056b3; /* Cambia el color del enlace al pasar el mouse por encima */
    text-decoration: underline; /* Añade subrayado al pasar el mouse por encima */
}
.edit-btn:hover, .delete-btn:hover {
    background-color: #218838; /* Cambia el color de fondo al pasar el mouse por encima */
    border-color: #218838; /* Cambia el color del borde al pasar el mouse por encima */
}
.pending {
    color: #dc3545;
}
</style>
@endsection