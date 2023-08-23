@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .custom-card {
  background-color: #28a745; /* Cambiar el color del fondo a verde (#28a745) */
  color: #fff; /* Cambiar el color del texto a blanco */
  border: none; /* Eliminar el borde del card */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Agregar una sombra al card */
  /* Otros estilos personalizados que desees agregar */
}
</style>
@endsection
