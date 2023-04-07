@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('CSS/styleruta.css') }}" tipe="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <table class="table table-striped">
                <thead>
                    <th>Orden</th>
                    <th>Nombre</th>                
                    <th>Activo 0=activo; 1 = no activo</th>                
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->activo}}</td>
                        <td>
                            <a href="{{ route('user.edit',$item->id)}}" class="btn btn-success">EDITAR</a>
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