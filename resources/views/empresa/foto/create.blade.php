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

            {!! Form::open(['route'=>['foto.store'],'method'=>'POST','files'=>true]) !!}

            <div class="jumbotron">
                
                <div class="form-group mb-3" >
                    <label for="nombre">INGRESE NOMBRE</label>
                    <input type="text" class="form-control mb-0 @error('nombre') is-invalid @enderror" name='nombre' value="{{old('nombre')}}">
                                    @error('nombre')
                                    <div class="invalid-feedback"><b>{{ $message }}</b></div>
                                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',null ,['class'=>'form-control','required']) !!}
                </div>

                               
                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    <input type="text" class="form-control mb-0 @error('orden') is-invalid @enderror" name='orden' value="{{old('orden')}}">
                                    @error('orden')
                                    <div class="invalid-feedback"><b>{{ $message }}</b></div>
                                    @enderror
                </div>
                <div class="form-group">
                    <label for="empresa_id">Empresa </label>
                    {!! Form::select('empresa_id',$empresa,null ,['class'=>'form-control']) !!}
                </div>
            

                <div class="form-group">
                    <label for="urlfoto">IMAGEN</label> <br>
                    <img src="/img/foto/foto.jpg">
                    {!! Form::file('urlfoto') !!}
                </div>
                {!! Form::submit('GUARDAR',['class'=>'btn btn-success','id' => 'boton-guardar']) !!}

            </div>
            
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