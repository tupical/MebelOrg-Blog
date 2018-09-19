
<section id="comments">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-7">
                <h2 class="comments__title mb-4">Комментарии</h2>
                @foreach($comments as $comment)


                <div class="comment mt-3 mb-4">
                    <div class="comment__top d-flex justify-content-between align-items-center mb-1">
                        <div class="comment__top_info d-flex align-items-center">
                            <img class="comment__top_info-img" src="{{ asset('/images/avatar/' . $comment->author->image) }}" alt="" data-pagespeed-url-hash="348088815" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            <p class="comment__top_info-name ml-3">{{ $comment->author->name }}</p>
                        </div>
                        <p class="comment__top_date">{{ humanize_date($comment->posted_at) }}</p>
                    </div>
                    <div class="comment__body">
                        <p class="comment__body_text">{!! $comment->content !!}</p>
                    </div>
                </div>

                @endforeach

                @include ('comments/_form')
            </div>
        </div>
    </div>
</section>