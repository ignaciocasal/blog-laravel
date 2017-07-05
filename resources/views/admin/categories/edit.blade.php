@extends('layouts.app')

@section('title','Editar Categoria')

@section('content')
    <h4>Editar - {{ $category->name }}</h4>
    {!! Form::open(['route'=>[ 'categories.update', $category ], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name', $category->name, ['class'=>'form-control', 'placeholder'=>'Nombre de la Categoria']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
