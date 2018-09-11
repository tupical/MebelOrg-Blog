@extends('layouts.app')
@section('title') {{$post->meta_title}} @endsection
@section('description') {{$post->meta_description}} @endsection
@section('content')
<style>
    .medium-insert-buttons{
        display: none;
    }
.article__content-img-big {
    margin: 10px -10%;
    border-radius: 3px;
    overflow: hidden;
}
.medium-insert-images-left {
    float: left;
    margin: 20px 25px 10px -10%;
    position: relative;
    max-width: calc(40% + 50px);
    border-radius: 3px;
    overflow: hidden;
}
.medium-insert-images-right {
    float: right;
    margin: 20px -10% 10px 25px;
    position: relative;
    z-index: 1;
    max-width: calc(40% + 50px);
    border-radius: 3px;
    overflow: hidden;
}
.medium-insert-images-grid figure{
    width: calc(100% - 20px);
    margin: 0 10px;
    text-align: center;
    border-radius: 3px;
    overflow: hidden;
}
.medium-insert-images-grid{
    margin: 10px calc(-10% - 20px);
    text-align: center;
    border-radius: 3px;
    overflow: hidden;
    display: -ms-flex;
    display: -o-flex;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-line-pack: justify!important;
    align-content: space-between!important;
}
.article__content p{
	    padding: 10px 0;
    font-weight: 400;
    font-style: normal;
    line-height: 1.68;
    font-family: Vollkorn,serif;
}
blockquote {
    margin: 20px -10%;
    padding: 20px 10%;
    background: #f7f7f7;
    border-radius: 3px;
    font-style: italic;
    font-family: Vollkorn,serif;
    font-size: 24px;
}
</style>

<section class="article">
    <div class="article__background d-flex align-content-between flex-wrap parallax-window" @if($post->image) style="background-image:url('{{ asset('storage/images/post/' . $post->image) }}')" @endif>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-md-12">
                    <ul class="bread-crumbs__list">
                        <li>
                            <a class="bread__link bread__home" href="">
                                Mebel.org
                            </a>
                        </li>
                        <li>
                            <a class="bread__link bread__link_active" href="">Статистика посещений компаний</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 d-flex align-items-end">
                    <div class="article__about">
                        <ul class="article__category d-flex">
                            @if (isset($post->category->name)) <li class="active"><a href="#"> {{$post->category->name}} </a></li>@endif
                            @foreach($categories as $category)
                                <li><a href="{{route('categories.show', $category)}}"> {{$category->name}}</a></li>
                            @endforeach
                        </ul>
                        <h1 class="article__title">{{ $post->title }}</h1>
                        <div class="article__description">
                            <div class="article__author d-flex align-items-center">
                                <div class="article__img" style="background-image:;">
                                </div>
                                <span class="article__name"{{ $post->author->name }}</span>
                            </div>
                            <span class="article__date">{{ humanize_date($post->posted_at) }}</span>
                            <span class="article__time">{{$post->view_count}} просмотров</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="article__content">
        <div class="container">
            <div class="row  d-flex justify-content-between">
                <div class="d-none d-md-block col-md-2">
                    <!--div class="article__navbar">
                      <h6>Содержание</h6>
                      <ul>
                        <li><a href="#">Вступление</a></li>
                        <li><a href="#">Содержание</a></li>
                        <li><a href="#">Финал</a></li>
                      </ul>
                    </div-->
                    <div class="article__sidebar">
                        <div class="article__share d-none d-md-block">
                            <div class="d-flex align-items-center flex-column">
                                <!--<div class="article__btn-rating">
                                  <span>3.7</span>
                                </div>
                                <button class="article__btn-share" type="button" name="share">
                                  <i class="fab fa-vk"></i>
                                </button>
                                <button class="article__btn-share" type="button" name="share">
                                  <i class="fab fa-facebook-f"></i>
                                </button>
                                <button class="article__btn-share" type="button" name="share">
                                  <i class="fab fa-twitter"></i>
                                </button>-->
                                <script type="text/javascript">(function(w,doc) {
                                        if (!w.__utlWdgt ) {
                                            w.__utlWdgt = true;
                                            var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
                                            s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                            s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
                                            var h=d[g]('body')[0];
                                            h.appendChild(s);
                                        }})(window,document);
                                </script>
                                <div data-mobile-view="false" data-share-size="30" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1788104" data-mode="share" data-background-color="#ffffff" data-hover-effect="rotate-cw" data-share-shape="round" data-share-counter-size="12" data-icon-color="#ffffff" data-mobile-sn-ids="fb.vk.tw.ok.wh.vb.tm." data-text-color="#000000" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-type="common" data-orientation="vertical" data-following-enable="false" data-sn-ids="fb.vk.ok.tm." data-preview-mobile="false" data-selection-enable="false" data-exclude-show-more="false" data-share-style="6" data-counter-background-alpha="1.0" data-top-button="false" class="uptolike-buttons" ></div>
                                <button class="article__btn-share" type="button" name="share" data-toggle="modal" data-target="#sign-in-modal">
                                    <i class="fas fa-bookmark"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    {!! $post->content !!}
                    <!--button type="button" name="button">Купить</button-->
                    <div class="article__underground">
                        <div class="row d-flex justify-content-between">
                            <div class="col-12 col-md-7">
                                <div class="article__underground-tags d-flex">
                                    @foreach ($post->tag as $keyword)
                                        <a href="/tags/{{ $keyword->name }}">{{ $keyword->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <ul class="article__underground-stars">
                                        @for($i = 1;$i <= 5;$i++)
                                            <i data-star_index="{{$i}}" class="{{($i<=$post->p_rating)?'fas':'far'}} fa-star"></i>
                                        @endfor
                                    <span class="article__underground-stars_total">{{ number_format($post->p_rating,1)  }}</span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-2">
                </div>
            </div>
        </div>
    </div>
</section>


		@include ('comments/_list')
		@include('posts.another', [$posts_random])
@endsection






