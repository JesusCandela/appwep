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
            <a href="{{route('empresas.create')}}" class="btn btn-success">NUEVA EMPRESA</a>
            <table class="table table-striped">
                <thead>
                    <th>Orden</th>
                    <th>Razón Social</th>                
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($empresas as $item)
                    <tr>
                        <td>{{$item->orden}}</td>
                        <td>{{$item->razonsocial}}</td>
                        <td>
                        <div class="btn-container">
                            <a href="{{ route('empresas.edit',$item->id)}}" class="btn btn-success edit-btn"><i class="fas fa-edit"></i> EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['empresas.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!! Form::button('<i class="fas fa-trash"></i> ELIMINAR',['type'=>'submit','class'=>'btn btn-danger delete-btn','onclick'=>'return confirm("ESTA SEGURO DE ELIMINAR")']) !!}
                            {!! Form::close() !!}
                        </div>

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


@endsection
