@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('CSS/stylefoto.css') }}" tipe="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <a href="{{route('foto.create')}}" class="btn btn-success">NUEVA FOTO</a>
            <table class="table table-striped">
                <thead>
                    <th>Orden</th>
                    <th>Imagen</th>                
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($fotos as $item)
                    <tr>
                        <td>{{$item->orden}}</td>
                        <td><img src="/img/foto/{{$item->urlfoto}}" width="300"></td>
                        <td>
                            <a href="{{ route('foto.edit',$item->id)}}" class="btn btn-success">EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['foto.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('ELIMINAR',['class'=>'btn btn-success','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
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

@endsection