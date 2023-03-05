@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('empresa.menu')
        <div class="col-sm-10">

            {!! Form::open(['route'=>['empresas.store'],'method'=>'POST','files'=>true]) !!}

            <div class="jumbotron">
                <div class="form-group">
                    <label for="title">Ingrese Nombre de la empresa</label>
                    {!! Form::text('title',null ,['class'=>'form-control','maxlength'=>'67','required']) !!}
                </div>

                <div class="form-group">
                    <label for="description">Ingrese una descripcion breve</label>
                    {!! Form::text('description',null ,['class'=>'form-control','maxlength'=>'155','required']) !!}
                </div>


                <div class="form-group">
                    <label for="razonsocial">INGRESE RAZON SOCIAL</label>
                    {!! Form::text('razonsocial',null ,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',null ,['class'=>'form-control','required']) !!}
                </div>
                <script>  CKEDITOR.replace( 'descripcion' );</script>


               
                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',null ,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="ruta_id">RUTAS </label>
                    {!! Form::select('ruta_id',$rutas,null ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                
                    {!! Form::checkbox('estado',null,null) !!}
                    <label for="estado">ESTADO </label>
                </div>


                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/empresa/foto.jpg">
                    {!! Form::file('urlfoto') !!}
                </div>
                <div class="form-group">
                    <label for="urllogo">IMAGEN 200px X 200px</label> <br>
                    <img src="/img/empresa/foto.jpg">
                    {!! Form::file('urllogo') !!}
                </div>

            </div>
            <a href="javascript: history.go(-1)" class="btn btn-success">CANCELAR</a>  
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success','onclick'=>'return alert("registro guardado exitosamente")']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection