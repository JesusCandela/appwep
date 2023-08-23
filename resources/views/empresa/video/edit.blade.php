@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('CSS/styleform.css') }}" tipe="text/css" rel="stylesheet">
    <link href="{{ asset('CSS/stylelogin.css') }}" tipe="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Editar Video</b> </div>

                    <div class="card-body">
                        {!! Form::model($video, ['route' => ['video.update', $video->id], 'method' => 'PATCH', 'files' => true]) !!}
                            <div class="form-group">
                                <label for="titulo">Título del Video</label>
                                {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                <label for="url_video">Archivo de Video (Max 3MB)</label>
                                {!! Form::file('url_video', ['class' => 'form-control-file']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
<style>
    /* Agrega esto en tu archivo de estilos CSS (styleform.css o stylelogin.css) */

</style>

@endsection
