@extends('layouts.app')
@section('content')
    @if($category->image!='')
        <section id="news-header" class="{{$category->slug}}" style="background: url({{asset('/storage/images/category/'.$category->image)}}) center top/cover no-repeat;">
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
                                    <a class="bread__link" href="{{route('categories.index')}}">Блог</a>
                                </li>
                                <li>
                                    <a class="bread__link bread__link_active" href="{{route('categories.show', $category)}}">{{$category->name}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="article__category d-flex">
                            <li class="active"><a href="{{route('categories.show', $category)}}">{{$category->name}}  </a></li>
                            @foreach($categories as $category_list)
                                <li><a href="{{route('categories.show', $category_list)}}">{{$category_list->name}} </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="news-title-other">{{$category->name}}</h1>
                    </div>
                </div>
            </div>
        </section>
    @else
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
                                <a class="bread__link" href="/">Блог</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="article__category d-flex" style="padding-top:70px;">
                        <li class="active"><a style="color:#000" href="{{route('categories.show', $category)}}">{{$category->name}}  </a></li>
                        @foreach($categories as $category_list)
                            <li><a style="color:#000" href="{{route('categories.show', $category_list)}}">{{$category_list->name}} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 class="news-title-other" style="color: #000;">{{$category->name}}</h1>
                </div>
            </div>
        </div>
    @endif

    <section id="news" class="news-other">
        <div class="container">
            <div class="row">
                @include ('posts/_list_formatted')
            </div>
            <div class="row">
                {{$posts->render()}}
            </div>
        </div>
    </section>
@endsection




