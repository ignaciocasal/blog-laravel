@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post Content Column -->

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $article->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $article->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                {{--<p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>--}}
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{  $article->created_at->diffForHumans() }} </p>

                <hr>

                <!-- Preview Image -->
                @foreach($article->images as $image)
                    <img class="img-responsive center-block" src="{{ asset('images/articles/'.$image->name ) }}" alt="{{ $image->name }}">
                    <hr>
                @endforeach

                <!-- Post Content -->
                <p>{!! $article->content !!}</p>

                <hr>
                <br>
                @if(count($article->tags)>0)
                    <h3>Tags</h3>
                    @foreach($article->tags as $tag)
                            <span style="font-size: 12px;" class="label label-default">{{ $tag->name }}</span>
                    @endforeach
                    <hr>
                @endif

                <br>
                <h3>Comentarios</h3>

                {{--Disqus--}}
                <div id="disqus_thread"></div>
                <script>

                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                     var disqus_config = function () {
                     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                     };
                     */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = '//bloglaravel-2.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                {{--End Discus--}}
                <hr>


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