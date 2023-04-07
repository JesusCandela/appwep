@extends('layouts.admin')
@section('content')
<head>
    <link href="{{ asset('CSS/styleform.css') }}" tipe="text/css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['ruta.update',$ruta],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">   
                <div class="form-group">
                    <label for="title">Ingrese Titulo</label>
                    {!! Form::text('title',$ruta->title ,['class'=>'form-control','required']) !!}
                </div>    
                <div class="form-group">
                    <label for="description">Ingrese Descripcion Corta</label>
                    {!! Form::text('description',$ruta->description,['class'=>'form-control','required','maxlength'=>'67']) !!}
                </div>
                

                <div class="form-group">
                    <label for="nombre">Ingrese Nombre</label>
                    {!! Form::text('nombre',$ruta->nombre ,['class'=>'form-control','required']) !!}
                </div>    
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',$ruta->descripcion,['class'=>'form-control','required']) !!}
                </div>
                <script>  CKEDITOR.replace( 'descripcion' );</script>


                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',$ruta->orden,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/ruta/{{$ruta->urlfoto}}">
                    {!! Form::file('urlfoto',['class'=>'form-control','required']) !!}
                </div>
            </div>           
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success','id' => 'boton-guardar']) !!}
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