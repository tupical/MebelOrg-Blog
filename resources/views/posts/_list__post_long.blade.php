
    <a href="{{ route('posts.show', $post)}}">
        <div class="news news__long"  style="background-image: url(@if ($post->image_preview) {{asset('/images/post/' . $post->image_preview)}} @else /images/post/default.jpg @endif);">
            <!---<img class="news__img" src="img/news-average-1.png" alt="Advise">-->
            <div class="news__label">@if (isset($post->category->id)){{ $post->category->name }}@endif</div>
            <div class="news__wrap_small">
                <div class="news__title-wrap news__title-wrap_small">
                    <h3 title="{{ $post->title }}" class="news__title news__title_small">{{ $post->title }}</h3>
                </div>
                <div class="news__info">
                    <p class="news__date">{{ humanize_date($post->posted_at) }}</p>
                    <div class="news__views">
                        <img class="news__views_ico news__info-ico" src="img/blog-eye.svg" alt="" data-pagespeed-url-hash="175637379" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <p class="news__views_text">{{$post->view_count}}</p>
                    </div>
                    <div class="news__rating">
                        <img class="news__rating_ico news__info-ico" src="img/white-star.svg" alt="" data-pagespeed-url-hash="2444918131" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        <p class="news__rating_rate">{{ number_format($post->p_rating,1)  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>


