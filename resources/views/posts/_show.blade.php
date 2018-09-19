<div class="news " onclick="window.location='{{ route('posts.show', $post)}}'">
	@if ($post->image)){{ Html::image(asset('/images/post/' . $post->image), $post->image, ['class' => '']) }}@endif
	@if (isset($post->category->id))<a class="news__label" href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>@endif
	<div class="news__wrap_big">
		<p class="news__title_big">{{ $post->title }}</p>
		<div class="news__info">
			<p class="news__date">{{ humanize_date($post->posted_at) }}</p>
			<div class="news__views">
				<p class="news__views_val">{{$post->view_count}}</p>
				<img src="img/blog-eye.svg" alt="">
			</div>
			<div class="news__rating">
				<p class="news__rating_val">{{ $post->rating }}/5</p>
				<img src="img/blog-rate.svg" alt="">
			</div>
		</div>
	</div>
</div>