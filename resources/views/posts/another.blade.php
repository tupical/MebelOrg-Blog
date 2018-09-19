
<section class="same-articles-after ">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<h2 class="same-articles-after__title">Смотрите также</h2>
			</div>
		</div>
	</div>
	<div class="same-articles-after__slider">
		@if(count($posts_random))
			@foreach($posts_random as $post)
				<div class="same-articles-after__slide">
					<a href="{{route('posts.show', $post)}}" class="same-articles-after__item">
					@if ($post->image)
						<div class="same-articles-after__img" style="background-image:url('{{ asset('/images/post/' . $post->image) }} ');">
						</div>
						@endif
						<h2 class="same-articles-after__title-slide">{{$post->title}}</h2>
						<p class="same-articles-after__text">{{$post->short_content}}</p>
					</a>
				</div>
			@endforeach
		@endif
	</div>
</section>





	

