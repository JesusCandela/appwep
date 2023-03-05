@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['post.update',$post],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">   
                <div class="form-group">
                    <label for="title">INGRESE title</label>
                    {!! Form::text('title',$post->title ,['class'=>'form-control']) !!}
                </div>    
                <div class="form-group">
                    <label for="description">INGRESE DESCRIPTIÓN</label>
                    {!! Form::text('description',$post->description,['class'=>'form-control','maxlength'=>'67']) !!}
                </div>
                

                <div class="form-group">
                    <label for="nombre">INGRESE nombre</label>
                    {!! Form::text('nombre',$post->nombre ,['class'=>'form-control']) !!}
                </div>    
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',$post->descripcion,['class'=>'form-control','maxlength'=>'67']) !!}
                </div>


                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',$post->orden,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="urlvideo">INGRESE VIDEO</label>
                    {!! Form::text('urlvideo',$post->urlvideo ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/post/{{$post->urlfoto}}">
                    {!! Form::file('urlfoto') !!}
                </div>
            </div>           
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection