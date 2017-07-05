@extends('layouts.app')

@section('title',__('messages.create_user'))

@section('content')
    {!! Form::open(['route'=>'users.store', 'method'=>'POST']) !!}
    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo Electronico']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password') !!}
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('type', ['member'=>'Miembro','admin' =>'Administrador'], null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
