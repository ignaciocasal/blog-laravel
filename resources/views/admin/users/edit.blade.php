@extends('layouts.app')

@section('title',__('messages.edit_user'))

@section('content')
    <h4>Editar - {{ $user->name }}</h4>
    {!! Form::open(['route'=>[ 'users.update', $user ], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Nombre Completo']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email') !!}
        {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Correo Electronico']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('type', [''=>'Seleccione un tipo', 'member'=>'Miembro','admin' =>'Administrador'], $user->type, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
