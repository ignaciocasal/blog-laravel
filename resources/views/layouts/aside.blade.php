<!-- Blog Search Well -->
<div class="well">
    <h4>{{ __('messages.search') }}</h4>
    <div class="input-group">
        <input type="text" class="form-control">
        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
    </div>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>{{ __('messages.categories') }}</h4>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{ route('home.search.category', $category->name) }}">{{ $category->name }}</a>
                <span class="badge">{{ $category->articles->count() }}</span>
            </li>
        @endforeach
    </ul>
</div>

<!-- Blog Tags Well -->
{{--<div class="well">
    <h4>Tags</h4>
    <ul class="list-group">
        @foreach($tags as $tag)
            <li class="list-group-item">
                <a href="#">{{ $tag->name }}</a>
                <span class="badge">{{ $tag->articles->count() }}</span>
            </li>
        @endforeach
    </ul>
</div>--}}

{{-- ///////////////////// --}}

<div class="well">
    <h4>{{ __('messages.tags') }}</h4>
        {{--@foreach($tags as $tags)
            <li class="list-group-item">
                <a href="#">{{ $tags->name }}</a>
                <span class="badge">{{ $tags->articles->count() }}</span>
            </li>
        @endforeach--}}
    <div id="Main">
        @foreach($tags as $tag)
            <a href="{{ route('home.search.tag', $tag->name) }}" class="poll_bar">{{ $tag->name }}</a> <span class="poll_val">{{ round($tag->articles->count()*100/$articles_count).'%'}}</span><br/>
        @endforeach
    </div>


</div>
{{-- ///////////////////// --}}


<!-- Side Text-Widget Well -->
{{--
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>--}}

@section('js')
    <script>
        $(document).ready(function(){
            // add button style
            $(".poll_bar").addClass("btn btn-default");
            // Add button style with alignment to left with margin.
            $(".poll_bar").css({"text-align":"left","margin":"5px"});

            //loop
            $(".poll_bar").each(
                function(i){
                    //get poll value
                    var bar_width = (parseFloat($(".poll_val").eq(i).text())/1.3).toString();
                    bar_width = bar_width + "%"; //add percentage sign.
                    //set bar button width as per poll value mention in span.
                    $(".poll_bar").eq(i).width(bar_width);

                    //Define rules.
                    var bar_width_rule = parseFloat($(".poll_val").eq(i).text());
                    if(bar_width_rule >= 50){$(".poll_bar").eq(i).addClass("btn btn-sm btn-success")}
                    if(bar_width_rule <  50){$(".poll_bar").eq(i).addClass("btn btn-sm btn-warning")}
                    if(bar_width_rule <= 10){$(".poll_bar").eq(i).addClass("btn btn-sm btn-danger")}
                });
        });
    </script>
@endsection

