@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-crumbs">
                    <ul class="bread-crumbs__list">
                        <li>
                            <a class="bread__link bread__home" href="{{route('home')}}">
                                Mebel.org
                            </a>
                        </li>
                        <li>
                            <a class="bread__link" href="">Блог</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="news-big-title">Избранное</h2>
            </div>
        </div>
        <div class="row">
            @forelse ($myFavorites as $post)
                <div class="col-4">
                    <div class="news news__average" onclick="window.location='{{ route('posts.show', $post)}}'">
                        @if ($post->hasThumbnail()){{ Html::image($post->thumbnail->getUrl(), $post->thumbnail->name, ['class' => '']) }}@endif
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
            @empty
                <p>You have no favorite posts.</p>
            @endforelse

            {{}}
        </div>
    </div>
@endsection 
  