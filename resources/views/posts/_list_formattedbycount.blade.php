@php $key=1; @endphp
@foreach($category['posts'] as $post)
    @if($key % 4 == 0)
        <div class="col-lg-3 col-0 order-lg-{{$key}} order-{{count($posts_popular)}}"></div>
        @php $key++; @endphp
    @endif
    <div class="col-lg-3 col-sm-6 col-12 order-{{$key}}"> @include ('posts/_list__post_short') </div>
    @php $key++; @endphp
@endforeach


@if(count($category['posts'])<=2)
    @foreach($category['posts'] as $post)
        <div class="col-lg-5 col-md-7 col-12 order-{{$key}}"> @include ('posts/_list__post_big') </div>
        @php $key++; @endphp
    @endforeach
@endif
@if(count($category['posts'])==3)
    @if($key==0) <div class="col-5"> @endif
        @if($key==1) <div class="col-4"> @endif
            <div class="news @if($key==0) news__big @else news__average @endif" onclick="window.location='{{ route('posts.show', $post)}}'">
                @if ($post->image){{ Html::image(asset('/storage/images/post/' . $post->image), $post->image, ['class' => '']) }}@endif
                @if (isset($post->category->id))<a class="news__label" href="/posts/{{ $post->category->slug }}">{{ $post->category->name }}</a>@endif
                <div class="news__wrap_big">
                    <p class="news__title_big">{{ $post->title }}</p>
                    <div class="news__info">
                        <p class="news__date">{{ humanize_date($post->posted_at) }}</p>
                        <div class="news__views">
                            <p class="news__views_val">{{$post->view_count}}</p>
                            <img src="img/blog-eye.svg" alt="">
                        </div>
                        <div class="news__rating">
                            <p class="news__rating_val">{{ number_format($post->p_rating, 1) }}/5</p>
                            <img src="img/blog-rate.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @if($key==0)</div>@endif
        @if($key==2)</div>@endif
@endif
@if(count($category['posts'])==4)
    @if($key==0||$key==2) <div class="col-3"> @endif
        @if($key==1||$key==3) <div class="col-6"> @endif
            <div class="news @if($key==0||$key==2) news__small @else news__long @endif" onclick="window.location='{{ route('posts.show', $post)}}'">
                @if ($post->image){{ Html::image(asset('/storage/images/post/' . $post->image), $post->image, ['class' => '']) }}@endif
                @if (isset($post->category->id))<a class="news__label" href="/posts/{{ $post->category->slug }}">{{ $post->category->name }}</a>@endif
                <div class="news__wrap_big">
                    <p class="news__title_big">{{ $post->title }}</p>
                    <div class="news__info">
                        <p class="news__date">{{ humanize_date($post->posted_at) }}</p>
                        <div class="news__views">
                            <p class="news__views_val">{{$post->view_count}}</p>
                            <img src="img/blog-eye.svg" alt="">
                        </div>
                        <div class="news__rating">
                            <p class="news__rating_val">{{ number_format($post->p_rating, 1) }}/5</p>
                            <img src="img/blog-rate.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @if($key==0||$key==2)</div>@endif
        @if($key==1||$key==3)</div>@endif
@endif
@if(count($category['posts'])==6)
    @if($key==0) <div class="col-5"> @endif
        @if($key==1) <div class="col-4"> @endif
            @if($key>=3) <div class="col-3"> @endif
                <div class="news @if($key==0) news__big @elseif($key==1||$key==2) news__average @else news__small @endif" onclick="window.location='{{ route('posts.show', $post)}}'">
                    @if ($post->image){{ Html::image(asset('/storage/images/post/' . $post->image), $post->image, ['class' => '']) }}@endif
                    @if (isset($post->category->id))<a class="news__label" href="/posts/{{ $post->category->slug }}">{{ $post->category->name }}</a>@endif
                    <div class="news__wrap_big">
                        <p class="news__title_big">{{ $post->title }}</p>
                        <div class="news__info">
                            <p class="news__date">{{ humanize_date($post->posted_at) }}</p>
                            <div class="news__views">
                                <p class="news__views_val">{{$post->view_count}}</p>
                                <img src="img/blog-eye.svg" alt="">
                            </div>
                            <div class="news__rating">
                                <p class="news__rating_val">{{ number_format($post->p_rating, 1) }}/5</p>
                                <img src="img/blog-rate.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @if($key==0)</div>@endif
            @if($key==2)</div><div class="row">@endif
            @if($key>=3)</div>@endif
        @if($key>=5)</div>@endif
@endif