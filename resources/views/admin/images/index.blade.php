@extends('layouts.app')

@section('title','Imágenes')

@section('content')

    <div class="row">
        @foreach($images as $image)
            <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="/images/articles/{{ $image->name }}" alt="image">
                        <div class="caption">
                            <h3>{{ $image->article->title }}</h3>
                            <p>{{ $image->article->user->name }}</p>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>



    <div class="text-right">
        {{ $images->links() }}
    </div>

@endsection