@extends('layouts.app')
@section('content')
<head>    
    <link href="{{ asset('CSS/styleform.css') }}" tipe="text/css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">

            {!! Form::open(['route'=>['lugar.store'],'method'=>'POST','files'=>true]) !!}

            <div class="jumbotron">
                <div class="form-group">
                    <label for="title">Ingrese Titulo</label>
                    {!! Form::text('title',null ,['class'=>'form-control','maxlength'=>'67','required']) !!}
                </div>

                <div class="form-group">
                    <label for="description">Ingrese Descripcion Corta</label>
                    {!! Form::text('description',null ,['class'=>'form-control','maxlength'=>'155','required']) !!}
                </div>


                <div class="form-group">
                    <label for="nombre">Ingrese Nombre</label>
                    {!! Form::text('nombre',null ,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',null ,['class'=>'form-control','required']) !!}
                </div>
                <script>  CKEDITOR.replace( 'descripcion' );</script>

                <div class="form-group">
                    <label for="latitud">Ingrese La Latitud</label>
                    {!! Form::text('latitud',null ,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="longitud">Ingrese La Longitud</label>
                    {!! Form::text('longitud',null ,['class'=>'form-control','required']) !!}
                </div>
               
                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',null ,['class'=>'form-control','required']) !!}
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
                    <img src="/img/lugar/foto.jpg">
                    {!! Form::file('urlfoto') !!}
                </div>
               

            </div>
            <a href="javascript: history.go(-1)" class="btn btn-success">CANCELAR</a>  
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success', 'id' => 'boton-guardar']) !!}
            {!! Form::close() !!}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <script>
                $(document).ready(function(){
                    $('#boton-guardar').click(function(){
                        // Esto se ejecutará cuando se haga clic en el botón 'Guardar'
                        // Si el formulario se envía correctamente, se mostrará un mensaje de éxito
                        // Si hay algún error, se mostrará un mensaje de error
                    });
                });
            </script>
        </div>
    </div>
</div>
</body>

@endsection