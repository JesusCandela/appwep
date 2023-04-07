@extends('layouts.admin')

@section('content')
<head>
    <link href="{{ asset('CSS/styleruta.css') }}" tipe="text/css" rel="stylesheet">
</head>
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
                        <td>{{$item->nombre}}</td>
                        <td>
                            <ul>
                            @forelse ($item->Empresa as $r)
                                <li><a href="{{ route('empresa.edit',$r->id)}}">{{$r->razonsocial}}</a></li>
                            @empty
                                --
                            @endforelse 
                            </ul>
                        </td>
                        <td>
                            <ol>
                            @forelse ($item->Lugar as $r)
                                <li><a href="{{ route('lugar.edit',$r->id)}}">{{$r->nombre}}</a></li>
                            @empty
                                --
                            @endforelse 
                            </ol>
                        </td>
                        <td>
                            <a href="{{ route('ruta.edit',$item->id)}}" class="btn btn-success btn-block"  >EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['ruta.destroy',$item->id],'style'=>'display:inline; margin: 2px']) !!}
                            {!! Form::submit('ELIMINAR',['class'=>'btn btn-success btn-block','style'=>'margin: 2px','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
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