@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['user.update',$user],'method'=>'PUT']) !!}
            <div class="jumbotron">   
                <div class="form-group">
                    <label for="name">{{$user->name}}</label>
                </div>    
                <div class="form-group">
                    {!! Form::checkbox('activo',null,$user->activo) !!}
                    <label for="activo">ACTIVO </label>
                </div>
            </div>           
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection