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
                            <li><a href="{{route('categories.show', $category)}}"> {{$category->name}}</a></li>
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
                            Тег {{$tag->name}}
                        @endif
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section id="news" class="news-other">
        <div class="container">
            <div class="row">
                @include ('posts/_list_formatted')
            </div>
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
