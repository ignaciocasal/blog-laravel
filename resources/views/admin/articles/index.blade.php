@extends('layouts.app')

@section('title','Articulos')

@section('content')
    <div class="row">
        <div class="col-lg-8 ">
            <a href="{{ route('articles.create') }}" class="btn btn-success">Nuevo Articulo</a>
        </div>

        <div class="col-lg-4">
            {!!   Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar articulos..']) !!}
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            {!! Form::close() !!}
        </div><!-- /.col-lg-3 -->
    </div><!-- /.row -->

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Categoría</th>
            <th>Usuario</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{ route('articles.destroy', $article->id) }}"  onclick="return confirm('Esta seguro que desea eliminar el articlulo?')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-right">
        {{ $articles->links() }}
    </div>

@endsection