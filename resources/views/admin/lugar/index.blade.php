@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('CSS/styleempresaindex.css') }}" tipe="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <a href="{{route('lugar.create')}}" class="btn btn-success">NUEVA LUGAR</a>
            <table class="table table-striped">
                <thead>
                    <th class="text-red">Orden</th>
                    <th class="text-red">Razón Social</th>                
                    <th class="text-red">Acción</th>
                </thead>
                <tbody>
                    @forelse ($lugars as $item)
                    <tr>
                        <td><b>{{$item->orden}}</b></td>
                        <td><b>{{$item->nombre}}</b></td>
                        <td>
                            <a href="{{ route('lugar.edit',$item->id)}}" class="btn btn-primary "><i class="fas fa-edit"></i>EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['lugar.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!! Form::button('<i class="fas fa-trash"></i>ELIMINAR',['class'=>'btn btn-danger','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
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
/* Títulos */
h1, h2, h3, h4, h5, h6 {
    font-weight: bold;
}

/* Texto normal */
p, td, th, li, a {
    font-size: 16px;
    line-height: 1.6;

}

    .text-red {
        color: blue;
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