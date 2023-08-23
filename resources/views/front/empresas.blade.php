@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('CSS/stylewelcome.css') }}" tipe="text/css" rel="stylesheet">

</head>
<body>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-12 pt-5 pb-5 justify-content-center">
            <h1 class="text-center">Empresas</h1>
        </div>
        @forelse ($empresas as $item)
            <div class="col-sm-4 mt-5 mb-5">
                <div class="card">
                    <img src="/img/empresa/{{$item->urlfoto}}" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 >{{$item->razonsocial}}</h3>
                        <p>{{$item->title}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/cliente/{{$item->slug}}" class="btn btn-success btn-block w-100">VISITAR</a>
                    </div>
                </div>
            </div>
        @empty            
        @endforelse   
        <div class="d-flex justify-content-center">{{$empresas->links()}}</div>

    </div>
</div>
</body>
<style>
     .card {
  width: 300px; /* Ancho deseado para las tarjetas */
  height: 400px; /* Altura deseada para las tarjetas */}
  .card {
  width: 300px;
  height: 400px;
  background-color:#666666; /* Color de fondo gris oscuro */
  color: #ffffff; /* Color de texto blanco */
  border: 1px solid #2b3036; /* Borde ligeramente más oscuro */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  max-height: 250px;
  object-fit: cover;
}

.card-body {
  padding: 20px;
}

.card-body h3 {
  font-size: 24px;
  margin-bottom: 10px;
}

.card-body p {
  font-size: 16px;
}

.card-footer {
  background-color: #2b3036; /* Color de fondo del footer, ligeramente más oscuro que el card */
  border-top: none;
  padding: 15px 20px;
}

.btn-block {
  border-radius: 0;
}

.btn-success {
  background-color: #28a745;
  border-color: #28a745;
}

.btn-success:hover {
  background-color: #218838;
  border-color: #1e7e34;
}
</style>
</style>
@endsection
