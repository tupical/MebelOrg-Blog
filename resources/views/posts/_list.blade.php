<section id="news">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="news-big-title">Новое</h2>
			</div>
		</div>
		<div class="row">
            @foreach($posts as $key=>$post)
                @if(count($posts)==3)
                    @if($key==0) <div class="col-lg-5 col-md-7 col-12"> @include ('posts/_list__post_big') </div> @endif
                    @if($key==1) <div class="col-lg-4 col-md-5 col-12 order-1"> @include ('posts/_list__post_average') @endif
                    @if($key==2) @include ('posts/_list__post_average', $post) </div> @endif
                @endif
                @if(count($posts)==4)
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
            @endforeach
		</div>
		<div class="row">
			<div class="col-12">
				<h2 class="news-big-title">Популярное</h2>
			</div>
		</div>
		<div class="row">
			@foreach($posts_popular as $key=>$post)
                @if($key==3) </div><div class="row"> @endif
				<div class="col-3">
					<div class="news news__small" onclick="window.location='{{ route('posts.show', $post)}}'">
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
				</div>
			@endforeach
		</div>

        @foreach($categories as $key=>$category)
            @if(count($category['posts'])>0)
            <div class="row">
                <div class="col-12">
                    <h2 class="news-big-title"><a class="news-big-title__link" href="{{route('categories.show', $category['category'])}}">{{$category['category']->name}}</a></h2>
                </div>
            </div>
            <div class="row">
                @foreach($category['posts'] as $key=>$post)
                    @if(count($category['posts'])<=2)
                        <div class="col-5">
                                <div class="news news__big" onclick="window.location='{{ route('posts.show', $post)}}'">
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
                          </div>
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

                @endforeach
            </div>
            @endif
        @endforeach
	</div>
</section>
