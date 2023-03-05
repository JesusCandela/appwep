@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <a href="{{route('empresa.create')}}" class="btn btn-success">NUEVA EMPRESA</a>
            <table class="table table-striped">
                <thead>
                    <th>Orden</th>
                    <th>Razón Social</th>                
                    
                    <th>Imagen</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($empresas as $item)
                    <tr>
                        <td>{{$item->orden}}</td>
                        <td>{{$item->razonsocial}}</td>
                        <td>
							<img src="/img/empresa/{{$item->urlfoto}}" width="100"/>
						</td>
                       
                        <td>
                            <a href="{{ route('empresa.edit',$item->id)}}" class="btn btn-success">EDITAR</a>
                            {!! Form::open(['method'=>'DELETE','route'=>['empresa.destroy',$item->id],'style'=>'display:inline']) !!}
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