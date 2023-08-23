@extends('layouts.app')
@section('content')
<head>
    <link href="{{ asset('CSS/vistacliente.css') }}" tipe="text/css" rel="stylesheet">
    <link href="{{ asset('CSS/stilelayouts.css') }}" tipe="text/css" rel="stylesheet">
    <link href="{{ asset('CSS/stylewelcome.css') }}" tipe="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


</head>
<body>
<div class="container bg-transparent ">
<div class="row justify-content-center">
            <div class="highlight-heading">
                <span><b> RUTAS TURÍSTICAS</b></span>
            </div>
            <div class="col-md-3 ">
                <div class=" bg-transparent p-3 position-fixed" style="top: 50px; left: 0; bottom: 0; overflow-y: auto;">
                <div class="highlight-heading">
                    <span><b> Categorias</b></span>
                </div>
                    <ul class="list-group  list-group-flush bg-transparent">
                        <li style="background: #36837c !important;"       
                            class="list-group-item "><a href="/lugares"><b> Lugares</b></a></li>
                        <li style="background: #36837c !important;" class="list-group-item bg-transparent"><a href="/rutas"><b>Rutas</b></a></li>
                        <li style="background: #36837c !important;" class="list-group-item bg-transparent"><a href="/cliente/empresas"><b>Empresas</b></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-6 align-items-center"> <!-- Centrar el contenido en dispositivos md y mayores -->
                        <div class="swiper-container bg-transparent position-relative ">
                            <div class="swiper-wrapper">
                                @forelse ($rutas as $item)
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img src="/img/ruta/{{$item->urlfoto}}" class="card-img-top">
                                        <div class="card-body text-center">
                                            <h3>{{$item->nombre}}</h3>
                                            <p>{{$item->title}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="/ruta/{{$item->slug}}" class="btn btn-success btn-block  w-100">VISITAR</a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                                
                            </div>
                            <div class="swiper-button-next position-absolute  " ></div>
                            <div class="swiper-button-prev position-absolute "></div>
                        </div>

                    </div>
                </div>
            
            </div>

                    
    
        <div class="col-sm-12 col-md-6 align-items-center bg-transparent ">
                <div class="highlight-heading">
                    <span><b> LUGARES </b></span>
                </div>
                <div class="swiper-container bg-transparent position-relative">
                    <div class="swiper-wrapper">
                        @forelse ($lugares as $item)
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="/img/lugar/{{$item->urlfoto}}" class="card-img-top lugar-img" alt="{{$item->nombre}}">
                                <div class="card-body text-center">
                                    <h3 class="card-title">{{$item->nombre}}</h3>
                                    <p class="card-text">{{$item->title}}</p>
                                    
                                </div>
                                    <div class="card-footer">
                                        <a href="/lugar/{{$item->slug}}" class="btn btn-success btn-block w-100">VISITAR</a>
                                    </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="swiper-button-next position-absolute"></div>
                    <div class="swiper-button-prev position-absolute"></div>
                </div>

                <div class="col-sm-12 bg-transparent align-items-center">
                <div class="highlight-heading">
                    <span><b> EMPRESAS</b></span>
                </div>
                    <div class="swiper-container bg-transparent position-relative">
                        <div class="swiper-wrapper">
                            @forelse ($empresas as $item)
                            <div class="swiper-slide">
                                <div class="card">
                                    <img src="/img/empresa/{{$item->urlfoto}}" class="card-img-top empresa-img" alt="{{$item->razonsocial}}">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">{{$item->razonsocial}}</h3>
                                        <p class="card-text">{{$item->title}}</p>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <a href="/cliente/{{$item->slug}}" class="btn btn-success btn-block w-100">VISITAR</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                        <div class="swiper-button-next position-absolute"></div>
                        <div class="swiper-button-prev position-absolute"></div>
                    </div>
                </div>
        </div>  
</div>
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiperRutas = new Swiper('.swiper-container', {
        slidesPerView: 1,  // Mostrar 3 elementos a la vez
        spaceBetween: 20, 
        initialSlide: Math.floor({{$rutas->count()}} / 2),
        loop: true, // Opción para que el swiper vuelva al inicio después de llegar al último slide
        autoplay: {
            delay: 3000, // Tiempo en milisegundos (3 segundos en este ejemplo)
        },  // Iniciar desde el elemento central
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

 

@endsection
