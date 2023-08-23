@extends('layouts.app')

@section('content')
<link href="{{ asset('CSS/stylegaleria.css') }}" tipe="text/css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<div class="container">
    <h1>Galería de Imágenes</h1>
    <div class="row">
        @foreach ($fotos as $foto)
        <div class="col-md-4">
            <div class="card">
            <img src="{{ asset('img/foto/' . $foto->urlfoto) }}" alt="Imagen" class="img-fluid card-img-top" onclick="mostrarImagenEnGrande('{{ asset('img/foto/' . $foto->urlfoto) }}', '{{ $foto->empresa ? $foto->empresa->nombre : $foto->lugar->nombre }}')">
                <div class="card-body">
                    <p class="card-text"><b>Likes:</b>  <span class="likes-count" id="likes-count-{{ $foto->id }}">{{ $foto->likes }}</span></p>
                    @if($foto->empresa)
                        <p class="card-text"><b>Empresa: </b>  {{ $foto->empresa->razonsocial }}</p>
                    @else
                        <p class="card-text"><b>Lugar: </b>  {{ $foto->lugar->nombre }}</p>
                    @endif
                    <div class="heart-container @if($foto->likes > 0) active @endif">
                        <i class="heart-icon far fa-heart"></i>
                        <i class="heart-icon fas fa-heart"></i>
                    </div>
                    <form action="{{ route('galeria.like', $foto->id) }}" method="POST" class="like-form">
                        @csrf
                        <button type="button" class="btn-like" data-photo-id="{{ $foto->id }}">
                            <i class="far fa-heart"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div id="imagen-en-grande" class="imagen-en-grande">
    <span class="cerrar-imagen" onclick="cerrarImagen()">&times;</span>
    <div class="imagen-contenedor">
        <img id="imagen-mostrada" src="" alt="Imagen en grande">
        <div class="imagen-info">
            <p id="imagen-nombre"></p>
        </div>
    </div>
    <div class="zoom-buttons">
        <button onclick="zoomIn()"><i class="fas fa-search-plus"></i>Acercar</button>
        <button onclick="zoomOut()"><i class="fas fa-search-minus"></i>Alejar</button>
    </div>
</div>
<script>
    const likeButtons = document.querySelectorAll('.btn-like');
    likeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const photoId = button.dataset.photoId;
            const heartContainer = button.querySelector('.heart-container');
            const likesCountElement = button.querySelector('.likes-count');
            
            // Actualizar el estado del botón y del corazón
          

            // Enviar la solicitud al servidor para actualizar el contador de likes
            fetch('/galeria/like/'+photoId, { method: 'POST' , body: new FormData(button.parentNode)})
                .then(response => response.json())
                .then(data => {
                    // Actualizar el contador de likes con el valor recibido del servidor
                    document.getElementById("likes-count-"+photoId).innerHTML=data.likes;
                })
                .catch(error => {
                    console.error('Error al actualizar los likes:', error);
                    // Restablecer el estado del botón y del corazón en caso de error
                    button.classList.toggle('active');
                    heartContainer.classList.remove('animate-heart');
                });
        });
    });

    // Función para mostrar la imagen en grande cuando se hace clic en una imagen pequeña
    function mostrarImagenEnGrande(url, nombreEmpresa) {
        var imagenMostrada = document.getElementById('imagen-mostrada');
        var imagenNombre = document.getElementById('imagen-nombre');

        imagenMostrada.src = url;
        imagenNombre.textContent = nombreEmpresa;

        document.getElementById('imagen-en-grande').style.display = 'flex';
        document.body.classList.add('imagen-mostrada');
    }

    function cerrarImagen() {
        document.getElementById('imagen-en-grande').style.display = 'none';
        document.body.classList.remove('imagen-mostrada');
    }
    function zoomIn() {
        var imagenMostrada = document.getElementById('imagen-mostrada');
        var newWidth = imagenMostrada.clientWidth * 1.5; // Aumentar el tamaño en un 20%
        imagenMostrada.style.width = newWidth + "px";
    }

    function zoomOut() {
        var imagenMostrada = document.getElementById('imagen-mostrada');
        var newWidth = imagenMostrada.clientWidth * 0.8; // Reducir el tamaño en un 20%
        imagenMostrada.style.width = newWidth + "px";
    }
</script>
@endsection
