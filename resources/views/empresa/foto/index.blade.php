
@extends('layouts.app')
@section('content')
<head>
    <link href="{{ asset('CSS/styleempresaindex.css') }}" tipe="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            @include('empresa.menu')
            <div class="col-sm-10">
                <a href="{{ route('foto.create') }}" class="btn btn-success">NUEVA FOTO</a>
                <table class="table table-striped">
                    <thead>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Likes</th>
                    </thead>
                    <tbody>
                        @forelse ($fotos as $item)
                        <tr>
                            <td> <b>{{ $item->orden }}</b></td>
                            <td>
                                <img src="/img/foto/{{ $item->urlfoto }}" width="300">
                                <p> <b>likes: </b> {{ $item->likes }}  </p>
                                
                                @if ($item->empresa)
                                    <p><b>Empresa: </b>  {{ $item->empresa->razonsocial}}</p>
                                @else 
                                    <p><b>No hay fotos de empresa actualmente/b>  </p>
                                @endif 
                               
                            </td>
                            <td class= "align-middle">
                                <a href="{{ route('foto.edit', $item->id) }}" class="btn btn-primary custom-btn edit-btn"><i class="fas fa-edit"></i>EDITAR</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['foto.destroy', $item->id], 'style' => 'display:inline']) !!}
                                {!! Form::button('<i class="fas fa-trash"></i> ELIMINAR',['type'=>'submit','class'=>'btn btn-danger delete-btn','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4"><b> No hay fotos disponibles.</b></td>
                            </tr>
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

}




.edit-btn:hover, .delete-btn:hover {
    background-color: #218838; /* Cambia el color de fondo al pasar el mouse por encima */
    border-color: #218838; /* Cambia el color del borde al pasar el mouse por encima */
}
.pending {
    color: #dc3545;
}
.custom-btn {
    width: 150px; /* Tamaño deseado para los botones */
    height:45px;
}
</style>
@endsection
