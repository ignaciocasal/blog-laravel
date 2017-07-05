@extends('layouts.app')

@section('title','Tags')

@section('content')
    <div class="row">
        <div class="col-lg-8 ">
            <a href="{{ route('tags.create') }}" class="btn btn-success">Nuevo Tag</a>
        </div>

        <div class="col-lg-4">
            {!!   Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag..']) !!}
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            {!! Form::close() !!}
        </div><!-- /.col-lg-3 -->
    </div><!-- /.row -->




    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{ route('tags.destroy', $tag->id) }}"  onclick="return confirm('Esta seguro que desea eliminar el tag?')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-right">
        {{ $tags->links() }}
    </div>
@endsection