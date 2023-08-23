<!-- index.blade.php -->

@extends('layouts.app')
@section('content')
<head>
    <link href="{{ asset('CSS/stylelayouts.css') }}" tipe="text/css" rel="stylesheet">
    <link href="{{ asset('CSS/vistacliente.css') }}" tipe="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 pt-5 pb-5">
            <h1 class="text-center">{{$ruta->nombre}}</h1>
            <div class="card mb-3 img-container"> 
                <img src="/img/ruta/{{$ruta->urlfoto}}" class="card-img-top" alt="{{$ruta->nombre}}">
                <div class="card-body">
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
                                    <li><b> No Hay Lugares registrados </b></li>                      
                                @endforelse
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="h4">Conocer empresas</h2>
                            <ul>
                                @forelse ($ruta->Empresa as $r)
                                    <li><a href="/{{$r->slug}}">{{$r->razonsocial}}</a> </li>
                                @empty   
                                    <li><b> No hay empresas registradas </b></li>                     
                                @endforelse
                                @csrf
                            </ul>
                        </div>
                    </div>
                    <p class="text-right"><b>N° De Visitas: </b>{{$ruta->visitas}}</p>
                    <p class="card-text"><b>Likes:</b>  <span class="likes-count" id="likes-count-{{ $ruta->id }}">{{ $ruta->likes }}</span></p>
                    </p>
                    <div class="heart-container @if($ruta->likes > 0) active @endif">
                        <i class="heart-icon far fa-heart"></i>
                        <i class="heart-icon fas fa-heart"></i>
                    </div>
                    <form action="{{ route('increment.Likesruta', $ruta->id) }}" method="POST" class="like-form">
                        @csrf
                        <button type="button" class="btn-like" data-ruta-id="{{ $ruta->id }}">
                            <i class="far fa-heart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
</body>
<script>
     const likeButtons = document.querySelectorAll('.btn-like');
    likeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const rutaid = button.dataset.rutaId;
            const heartContainer = button.querySelector('.heart-container');
            const likesCountElement = button.querySelector('.likes-count');
            

            // Enviar la solicitud al servidor para actualizar el contador de likes
            fetch('/increment-likesruta/'+rutaid, { method: 'POST' , body: new FormData(button.parentNode)})
                .then(response => response.json())
                .then(data => {
                    // Actualizar el contador de likes con el valor recibido del servidor
                    document.getElementById("likes-count-{{ $ruta->id }}").innerHTML=data.likes;

                })
                .catch(error => {
                    console.error('Error al actualizar los likes:', error);
                    // Restablecer el estado del botón y del corazón en caso de error
                    button.classList.toggle('active');
                    heartContainer.classList.remove('animate-heart');
                });

        });
    });
</script>
@endsection

