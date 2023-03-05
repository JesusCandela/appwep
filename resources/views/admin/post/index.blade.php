@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <a href="{{route('post.create')}}" class="btn btn-success">NUEVA PUBLICACIÓN</a>
            <table class="table table-striped">
                <thead>
                    <th>Orden</th>
                    <th>Nombre</th>                
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($posts as $item)
                    <tr>
                        <td>{{$item->orden}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>
                            <a href="{{ route('post.edit',$item->id)}}" class="btn btn-success">EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['post.destroy',$item->id],'style'=>'display:inline']) !!}
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
@endsection