@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('CSS/stylewelcome.css') }}" tipe="text/css" rel="stylesheet">

</head>
<body>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-12 pt-5 pb-5">
            <h1 class="text-center, neon">RUTAS TURÍSTICAS</h1>
        </div>
        @forelse ($rutas as $item)
            <div class="col-sm-4 mt-5 mb-5">
                <div class="card">
                    <img src="/img/ruta/{{$item->urlfoto}}" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 >{{$item->nombre}}</h3>
                        <p>{{$item->title}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/ruta/{{$item->slug}}" class="btn btn-success btn-block">VISITAR</a>
                    </div>
                </div>
            </div>
        @empty            
        @endforelse   

    </div>
</div>
</body>

@endsection
