@extends('layouts.app')

@section('title','Home')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    {{ __('messages.articles') }}
                    <small>
                        @if(isset($category))
                            {{ $category->name }}
                            @elseif(isset($tag))
                                {{ $tag->name }}
                        @endif
                    </small>
                </h1>
                @if(count($articles)>0)
                    @foreach($articles as $article)
                        <h2>
                            <a href="{{ route('home.view.article', $article->slug) }}">{{ $article->title }}</a>
                        </h2>
                        <p class="lead">
                            by <a href="#">{{ $article->user->name }}</a>
                        </p>
                        <i class="fa fa-folder-open-o" aria-hidden="true"></i> <a href="{{ route('home.search.category', $article->category->name) }}">{{ $article->category->name }}</a>
                        <div class="pull-right">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> <small>{{  $article->created_at->diffForHumans() }} </small>
                        </div>
                        @foreach($article->images as $image)
                        <hr>
                            <img class="img-responsive center-block" src="{{ asset('images/articles/'.$image->name ) }}" alt="{{ $image->name }}">
                        @endforeach
                        <hr>
                        @if(strlen($article->content) < 240)
                            <p>{!! $article->content !!}</p>
                        @else
                            <p>{!! substr($article->content, 0, 240).'...' !!}</p>
                        @endif
                        <a class="btn btn-primary" href="{{ route('home.view.article', $article->slug) }}">{{ __('messages.read_more') }} <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                @else
                    <p class="text-center">{{ __('messages.empty_articles') }}</p>
                @endif

                <!-- Pager -->
                <div class="text-right">
                    {{ $articles->links() }}
                </div>


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

               @include('layouts.aside')

            </div>

        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            @include('layouts.footer')
        </footer>

    </div>
    <!-- /.container -->
@endsection
