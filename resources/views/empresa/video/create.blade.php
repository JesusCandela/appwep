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
                    <div class="card-header">Crear Video</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'video.store', 'method' => 'POST', 'files' => true]) !!}
                            <div class="form-group">
                                <label for="titulo">Título del Video</label>
                                {!! Form::text('titulo', null, ['class' => 'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                <label for="url_video">Archivo de Video (Max 3MB)</label>
                                {!! Form::file('url_video', ['class' => 'form-control-file', 'required']) !!}
                            </div>

                            <div class="form-group">
                                <label for="empresa_id">Selecciona una Empresa</label>
                                {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
