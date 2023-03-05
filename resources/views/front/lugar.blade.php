@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 pt-5 pb-5">
            <h1 class="text-center">{{$lugar->nombre}}</h1>
            <img src="/img/lugar/{{$lugar->urlfoto}}" class="img-fluid">
            <hr>
            {!! $lugar->descripcion !!}            
            <hr>   
            
            <style>
                #panorama {
                    width: 100%;
                    height: 400px;
                }
            </style>

            @forelse ($lugar->Foto as $item)
                <div id="panorama"></div>
                <script>
                pannellum.viewer('panorama', {
                    "type": "equirectangular",
                    "panorama": "http://127.0.0.1:8000/img/lugar/{{$item->urlfoto}}"
                });
                </script>
            @empty
                --
            @endforelse
          
            <p class="text-right">{{$lugar->visitas}}</p>
        </div>
    </div>
</div>
@endsection
