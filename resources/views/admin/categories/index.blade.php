@extends('layouts.app')

@section('title','Categorias')

@section('content')
    <div class="col-lg-9 ">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Nueva Categoria</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="{{ route('categories.destroy', $category->id) }}"  onclick="return confirm('Esta seguro que desea eliminar la categoria?')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="text-right">
        {{ $categories->links() }}
    </div>

@endsection