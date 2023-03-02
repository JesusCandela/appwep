@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 pt-5 pb-5">
            <h1 class="text-center">{{$ruta->nombre}}</h1>
            <img src="/img/ruta/{{$ruta->urlfoto}}" class="img-fluid">
            <hr>
            {!! $ruta->descripcion !!}            
            <hr>           
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="h4">Visitar Lugares turisticos</h2>
                    <ul>
                        @forelse ($ruta->Lugar as $r)
                            <li><a href="/lugar/{{$r->slug}}">{{$r->nombre}}</a> </li>
                        @empty  
                            <li>-</li>                      
                        @endforelse
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h2 class="h4">Conocer empresas</h2>
                    <ul>
                        @forelse ($ruta->Empresa as $r)
                            <li><a href="/{{$r->slug}}">{{$r->razonsocial}}</a> </li>
                        @empty   
                            <li>-</li>                     
                        @endforelse
                    </ul>
                </div>
            </div>

            <p class="text-right">{{$ruta->visitas}}</p>
        </div>
    </div>
</div>
@endsection
