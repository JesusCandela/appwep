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

            {!! Form::open(['route'=>['ruta.store'],'method'=>'POST','files'=>true]) !!}

            <div class="jumbotron">
                <div class="form-group">
                    <label for="title">INGRESE TITULO</label>
                    {!! Form::text('title',null ,['class'=>'form-control','maxlength'=>'67','required']) !!}
                </div>

                <div class="form-group">
                    <label for="description">INGRESE DESCRIPCIÓN CORTA</label>
                    {!! Form::text('description',null ,['class'=>'form-control','maxlength'=>'155','required']) !!}
                </div>


                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!! Form::text('nombre',null ,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',null ,['id'=>'descripcion','class'=>'form-control','required']) !!}
                </div>
                <script>  CKEDITOR.replace( 'descripcion' );</script>

               
                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',null ,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/ruta/foto.jpg">
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