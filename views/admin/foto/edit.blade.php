@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['foto.update',$foto],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">

                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!! Form::text('nombre',$foto->nombre ,['class'=>'form-control']) !!}
                </div>    
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',$foto->descripcion,['class'=>'form-control','maxlength'=>'67']) !!}
                </div>

                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',$foto->orden,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="lugar_id">LUGARES </label>
                    {!! Form::select('lugar_id',$lugar,$foto->lugar_id ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::checkbox('tipo',null,$foto->tipo) !!}
                    <label for="tipo">TIPO </label>
                </div>
              
                <div class="form-group">
                    <label for="urlfoto">IMAGEN</label> <br>
                    <img src="/img/foto/{{$foto->urlfoto}}">
                    {!! Form::file('urlfoto') !!}
                </div>
               


            </div>           
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection