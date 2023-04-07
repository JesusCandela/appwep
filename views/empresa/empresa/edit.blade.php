@extends('layouts.app')
@section('content')
<head>
    <link href="{{ asset('CSS/styleform.css') }}" tipe="text/css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('empresa.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['empresas.update',$empresa],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">   
                <div class="form-group">
                    <label for="title">Ingrese Titulo</label>
                    {!! Form::text('title',$empresa->title ,['class'=>'form-control']) !!}
                </div>    
                <div class="form-group">
                    <label for="description">Ingrese Descripcion Corta</label>
                    {!! Form::text('description',$empresa->description,['class'=>'form-control','maxlength'=>'67']) !!}
                </div>
                

                <div class="form-group">
                    <label for="razonsocial">Ingrese Razon Social</label>
                    {!! Form::text('razonsocial',$empresa->razonsocial ,['class'=>'form-control']) !!}
                </div>    
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',$empresa->descripcion,['class'=>'form-control','maxlength'=>'67']) !!}
                </div>
                <script>  CKEDITOR.replace( 'descripcion' );</script>



                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',$empresa->orden,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="ruta_id">RUTAS </label>
                    {!! Form::select('ruta_id',$rutas,$empresa->ruta_id ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                
                    {!! Form::checkbox('estado',null,$empresa->estado) !!}
                    <label for="estado">ESTADO </label>
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/empresa/{{$empresa->urlfoto}}">
                    {!! Form::file('urlfoto') !!}
                </div>
                <div class="form-group">
                    <label for="urllogo">IMAGEN 200px X 200px</label> <br>
                    <img src="/img/empresa/{{$empresa->urllogo}}">
                    {!! Form::file('urllogo') !!}
                </div>


            </div> 
            <a href="javascript: history.go(-1)" class="btn btn-success">CANCELAR</a>          
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