@extends('layouts.app')

@section('content')
	<section id="news-header" class="news-main">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-crumbs">
						<ul class="bread-crumbs__list">
							<li>
								<a class="bread__link bread__home" href="">
									Mebel.org
								</a>
							</li>
							<li>
								<a class="bread__link bread__link_active" href="">Блог</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<ul class="article__category d-flex">
						@foreach($categories as $category)
							<li><a href="{{route('categories.show', $category['category'])}}"> {{$category['category']->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h1 class="news-title">
						@if (request()->has('q'))
							{{ trans_choice('posts.search_results', $posts->count(), ['query' => request()->input('q')]) }}
						@else
							Блог
						@endif
					</h1>
				</div>
			</div>
		</div>
	</section>
	<section id="news">
		<div class="container">

			<div class="row">
				<div class="col-12">
					<h2 class="news-big-title">Новое</h2>
				</div>
			</div>
			<div class="row">
				@include('posts/_list_formatted')
			</div>
			<div class="row">
				<div class="col-12">
					<h2 class="news-big-title">Популярное</h2>
				</div>
			</div>
			<div class="row">
				@php $key=1; @endphp
				@foreach($posts_popular as $post)
					@if($key % 4 == 0)
						<div class="col-lg-3 col-0 order-lg-{{$key}} order-{{count($posts_popular)}}"></div>
						@php $key++; @endphp
					@endif
						<div class="col-lg-3 col-sm-6 col-12 order-{{$key}}"> @include ('posts/_list__post_short') </div>
					@php $key++; @endphp
				@endforeach

			</div>

			@foreach($categories as $category)
				<div class="row">
					<div class="news-title-wrap d-flex align-items-baseline">
						<h2 class="news-big-title">{{$category['category']->name}}</h2><a class="news__all ml-3" href="{{route('categories.show', $category['category'])}}">Все статьи</a>
					</div>
				</div>
				<div class="row">
				@php $key=1; @endphp
				@foreach($category['posts'] as $post)
					@if($key % 4 == 0)
						<div class="col-lg-3 col-0 order-lg-{{$key}} order-{{count($posts_popular)}}"></div>
						@php $key++; @endphp
					@endif
					<div class="col-lg-3 col-sm-6 col-12 order-{{$key}}"> @include ('posts/_list__post_short') </div>
					@php $key++; @endphp
				@endforeach
				</div>
			@endforeach

		</div>
	</section>


  
  
  @include ('posts/_search_form')

    <div class="d-flex justify-content-between">
    <div class="p-2">
      <a href="{{ route('posts.feed') }}" class="pull-right" data-turbolinks="false">
          <i class="fa fa-rss" aria-hidden="true"></i>
      </a>
    </div>
  </div>
@endsection
