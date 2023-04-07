@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('CSS/stylefrontlugar.css')}}" tipe="text/css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 pt-5 pb-5">
            <h1 class="text-center">{{$empresa->razonsocial}}</h1>
            <img src="/img/empresa/{{$empresa->urlfoto}}" class="img-fluid">
            <hr>
            {!! $empresa->descripcion !!}            
            <hr> 
            <p class="text-right">{{$empresa->visitas}}</p>
        </div>
    </div>
</div>  
</body>

@endsection
