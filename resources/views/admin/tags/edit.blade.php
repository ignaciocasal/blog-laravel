@extends('layouts.app')

@section('title','Editar Tag')

@section('content')
    <h4>Editar - {{ $tag->name }}</h4>
    {!! Form::open(['route'=>[ 'tags.update', $tag ], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name', $tag->name, ['class'=>'form-control', 'placeholder'=>'Nombre del Tag']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
