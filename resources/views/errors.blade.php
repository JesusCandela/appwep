@extends('layouts.app') 

@section('content')
    <div class="error-container">
        <h1>Error {{ $errorCode }}</h1>
        <p>{{ $errorMessage }}</p>
        <a href="{{ route('welcome') }}" class="btn btn-primary">Volver a la página de inicio</a>
    </div>
@endsection
<style>
.error-container {
    text-align: center;
    margin-top: 100px;
}

.error-container h1 {
    font-size: 48px;
    color: #FF0000;
    margin-bottom: 20px;
}

.error-container p {
    font-size: 20px;
    color: #333;
    margin-bottom: 30px;
}

.btn {
    background-color: #007BFF;
    color: #FFF;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
