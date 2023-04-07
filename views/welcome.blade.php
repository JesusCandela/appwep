@extends('layouts.app')
@section('content')
<head>
    <link href="{{ asset('CSS/stylewelcome.css') }}" tipe="text/css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 pt-5 pb-5">
            <h1 class="text-center text-success">RUTAS TURÍSTICAS</h1>
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
        <div class="col-sm-12 pt-5 pb-5 text-center">
            <a href="/rutas" class="btn btn-success">MÁS RUTAS TURÍSTICAS</a>
        </div>


        <div class="col-sm-6 bg-light" >            
            <h2 class="text-center">LUGARES</h2>            
            @forelse ($lugares as $item)
                <div class="row mt-5 mb-3">                    
                    <div class="col-sm-6">                    
                        <img src="/img/lugar/{{$item->urlfoto}}" class="img-fluid">
                    </div>
                    <div class="col-sm-6">
                        <h3 class="h5">{{$item->nombre}}</h3>
                        <p>{{$item->title}}</p>
                        <a href="/lugar/{{$item->slug}}" class="btn btn-success btn-block">VISITAR</a>
                    </div>
                </div>                
            @empty                
            @endforelse
        </div>
       
        <div class="col-sm-6 bg-light">
            <h2 class="text-center">EMPRESAS</h2>            
            @forelse ($empresas as $item)
                <div class="row mt-5 mb-3">
                    <div class="col-sm-6">                    
                        <img src="/img/empresa/{{$item->urlfoto}}" class="img-fluid" >
                    </div>
                    <div class="col-sm-6">
                        <h3 class="h5">{{$item->razonsocial}}</h3>
                        <p>{{$item->title}}</p>
                        <a href="/{{$item->slug}}" class="btn btn-success btn-block">VISITAR</a>
                    </div>
                </div>                
            @empty                
            @endforelse
        </div>
        
        
        
    </div>
</div>
</body>

@endsection
