@extends('layouts.app')

@section('content')
<head>   
    <link href="{{ asset('CSS/stylelayouts.css') }}" tipe="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('CSS/vistacliente.css')}}" type="text/css">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 pt-5 pb-5">
        <h1 class="text-center">{{$lugar->nombre}}</h1>
            <div class="card mb-3 img-container">
                <img src="/img/lugar/{{$lugar->urlfoto}}" class="card-img-top img-fluid">
                <div class="card-body">
                    <hr>
                    {!! $lugar->descripcion !!}            
                    <hr>   
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner">
                            @forelse ($lugar->Foto as $key => $item)
                                <div class="carousel-item @if($key == 0) active @endif">
                                    <img src="/img/foto/{{ $item->urlfoto }}" class="card-img-top img-fluid">
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    No hay Imagen adicionales de {{$lugar->nombre}}
                                </div>
                            @endforelse
                        </div>
                    </div>
                    
                        <div class="col-sm-12 col-md-6 mt-4">
                            <a href="https://www.google.com/maps/dir//{{$lugar->latitud}},{{$lugar->longitud}}"
                            class="btn btn-primary btn-block text-left">
                            Cómo llegar <i class="fas fa-map-marker-alt ml-2"></i>
                            </a>
                        </div>
                  

                    <p class="text-left"><b>N° De Visitas: </b>{{$lugar->visitas}}</p>
                    <p class="card-text"><b>Likes:</b>  <span class="likes-count" id="likes-count-{{ $lugar->id }}">{{ $lugar->likes }}</span></p>
                    </p>
                    <div class="heart-container @if($lugar->likes > 0) active @endif">
                        <i class="heart-icon far fa-heart"></i>
                        <i class="heart-icon fas fa-heart"></i>
                    </div>
                    <form action="{{ route('increment.Likeslugar', $lugar->id) }}" method="POST" class="like-form">
                        @csrf
                        <button type="button" class="btn-like" data-lugar-id="{{ $lugar->id }}">
                            <i class="far fa-heart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<style>
    /* Estilos para el carrusel */
    #carousel {
        max-width: 500px; /* Ancho máximo del carrusel */
        max-height: 400px;
        margin: 20px auto ; /* Centrar horizontalmente el carrusel */
        border: 2px solid #ccc; /* Agregar un borde alrededor del carrusel */
        overflow: hidden; /* Ocultar el contenido que se desborda del carrusel */
        border-radius: 10px; /* Agregar bordes redondeados al carrusel */
    }

    .carousel-inner {
        border-radius: 10px; /* Agregar bordes redondeados a los elementos del carrusel */
    }

    .carousel-item img {
        width: 100%; /* Asegurarse de que las imágenes se ajusten al tamaño del carrusel */
    }
    
</style>
<script>
    $(document).ready(function() {
        // Inicializa el carrusel con un intervalo de 3 segundos
        $('#carousel').carousel({
            interval: 2000,
            pause: false // Esta opción deshabilita la pausa al pasar el mouse sobre el carrusel
        });
    });

   const likeButtons = document.querySelectorAll('.btn-like');
    likeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const lugarId = button.dataset.lugarId;
            const heartContainer = button.querySelector('.heart-container');
            const likesCountElement = button.querySelector('.likes-count');
            

            // Enviar la solicitud al servidor para actualizar el contador de likes
            fetch('/increment-likeslugar/'+lugarId, { method: 'POST', body: new FormData(button.parentNode) })
                .then(response => response.json())
                .then(data => {
                    // Actualizar el contador de likes con el valor recibido del servidor
                    document.getElementById("likes-count-{{ $lugar->id }}").innerHTML=data.likes;

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
