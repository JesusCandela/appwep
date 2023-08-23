@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{asset('CSS/vistacliente.css')}}" tipe="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-sm-8 pt-5 pb-5">
            <h1 class="text-center">{{$empresa->razonsocial}}</h1>
            <div class=" card mb-3 img-container">
                <img src="/img/empresa/{{$empresa->urlfoto}}" class="img-fluid">
                <div class="card-body">
                    <hr>
                    {!! $empresa->descripcion !!}            
                    <hr>
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner">
                            @forelse ($fotos as $key => $item)
                                <div class="carousel-item @if($key == 0) active @endif">
                                    <img src="/img/foto/{{ $item->urlfoto }}" class="card-img-top img-fluid">
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    No hay Imagen adicionales de {{$empresa->razonsocial}}
                                </div>
                            @endforelse
                        </div>
                    </div> 
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner">
                            <td>
                                @forelse ($videos as $key => $item)
                                <td> <b>{{ $item->orden }}</b></td>
                                <div class="carousel-item m-0 @if($key == 0) active @endif">
                                    <iframe src="/storage/{{ $item->url_video }}"></iframe>
                                </div>
                                @empty
                                    <div class="carousel-item active">
                                        No hay videos agregados en {{$empresa->razonsocial}}
                                    </div>
                                @endforelse
                            </td>
                        </div>
                    </div> 
                    <p>
                        <b>N° De Visitas: </b>{{$empresa->visitas}}
                        <p class="card-text"><b>Likes:</b>  <span class="likes-count" id="likes-count-{{ $empresa->id }}">{{ $empresa->likes }}</span></p>
                    </p>
                    <div class="heart-container @if($empresa->likes > 0) active @endif">
                        <i class="heart-icon far fa-heart"></i>
                        <i class="heart-icon fas fa-heart"></i>
                    </div>
                    <form action="{{ route('increment.Likesempresa', $empresa->id) }}" method="POST" class="like-form">
                        @csrf
                        <button type="button" class="btn-like" data-empresa-id="{{ $empresa->id }}">
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
   const likeButtons = document.querySelectorAll('.btn-like');
    likeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const empresaid = button.dataset.empresaId;
            const heartContainer = button.querySelector('.heart-container');
            const likesCountElement = button.querySelector('.likes-count');
            

            // Enviar la solicitud al servidor para actualizar el contador de likes
            fetch('/increment-likesempresa/'+empresaid, { method: 'POST' , body: new FormData(button.parentNode)})
                .then(response => response.json())
                .then(data => {
                    // Actualizar el contador de likes con el valor recibido del servidor
                    document.getElementById("likes-count-{{ $empresa->id }}").innerHTML=data.likes;

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
