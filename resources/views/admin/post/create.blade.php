@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">

            {!! Form::open(['route'=>['post.store'],'method'=>'POST','files'=>true]) !!}

            <div class="jumbotron">
                <div class="form-group">
                    <label for="title">INGRESE title</label>
                    {!! Form::text('title',null ,['class'=>'form-control','maxlength'=>'67','required']) !!}
                </div>

                <div class="form-group">
                    <label for="description">INGRESE description</label>
                    {!! Form::text('description',null ,['class'=>'form-control','maxlength'=>'155','required']) !!}
                </div>


                <div class="form-group">
                    <label for="nombre">INGRESE Nombre</label>
                    {!! Form::text('nombre',null ,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!! Form::textarea('descripcion',null ,['class'=>'form-control','required']) !!}
                </div>

               
                <div class="form-group">
                    <label for="orden">INGRESE ORDEN</label>
                    {!! Form::text('orden',null ,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="urlvideo">INGRESE VIDEO</label>
                    {!! Form::text('urlvideo',null ,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/post/foto.jpg">
                    {!! Form::file('urlfoto') !!}
                </div>

            </div>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection