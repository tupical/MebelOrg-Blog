@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d\TH:i') : date('Y-m-d\TH:i:s'));
@endphp

@if(isset($post->image))
<div class="form-group">
    {{ Html::image(asset('/images/post/' . $post->image), $post->image, [ 'width' => '350']) }}

    <button type="button" class="destroy_image btn btn-link text-danger " ><i class="fa fa-trash" aria-hidden="true" ></i>Удалить картинку</button>
</div>
@endif

@if(isset($post->image_preview))
<div class="form-group">
    {{ Html::image(asset('/images/post/' . $post->image_preview), $post->image_preview, [ 'width' => '350']) }}

    <button type="button" class="destroy_image_preview btn btn-link text-danger " ><i class="fa fa-trash" aria-hidden="true" ></i>Удалить картинку</button>
</div>
@endif

<div class="form-group">
    {!! Form::label('title', __('posts.attributes.title')) !!}
    {!! Form::text('title', null, ['autocomplete' => 'off', 'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('title'))
        <span class="invalid-feedback">{{ $errors->first('title') }}</span>
    @endif
</div>

<!-- <div class="form-group">
    {!! Form::label('rating', __('posts.attributes.rating')) !!}
    {!! Form::select('rating', [1 => 1,2 => 2,3 => 3,4 => 4,5 => 5], null, ['class' => 'form-control' . ($errors->has('rating') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('rating'))
        <span class="invalid-feedback">{{ $errors->first('rating') }}</span>
    @endif
</div> -->

<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('author_id', __('posts.attributes.author')) !!}
        {!! Form::select('author_id', $users, null, ['class' => 'form-control' . ($errors->has('author_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('author_id'))
            <span class="invalid-feedback">{{ $errors->first('author_id') }}</span>
        @endif
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('posted_at', __('posts.attributes.posted_at')) !!}

		{!! Form::datetimelocal('posted_at', $posted_at, ['class' => 'form-control' . ($errors->has('posted_at') ? ' is-invalid' : ''), 'required']) !!}
      
	  @if ($errors->has('posted_at'))
            <span class="invalid-feedback">{{ $errors->first('posted_at') }}</span>
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('featured_image', __('posts.attributes.featured_image')) !!}
    {!! Form::file('featured_image') !!}

    @if ($errors->has('featured_image'))
        <span class="invalid-feedback">{{ $errors->first('featured_image') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('featured_image_preview', __('posts.attributes.featured_image_preview')) !!}
    {!! Form::file('featured_image_preview') !!}

    @if ($errors->has('featured_image_preview'))
        <span class="invalid-feedback">{{ $errors->first('featured_image_preview') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('short_content', __('posts.attributes.short_content')) !!}
    {!! Form::text('short_content', null, ['autocomplete' => 'off', 'class' => 'form-control' . ($errors->has('short_content') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('short_content'))
        <span class="invalid-feedback">{{ $errors->first('short_content') }}</span>
    @endif
</div>


<div class="form-group">
    <div class="container">
        <div class="col-12 col-md-7 content-edit">
            {!! Form::label('content', __('posts.attributes.content')) !!}
            {!! Form::textarea('content', null, ['class' => 'editable' . ($errors->has('content') ? ' is-invalid' : ''), 'required' => 'required']) !!}

            @if ($errors->has('content'))
                <span class="invalid-feedback">{{ $errors->first('content') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('meta_title', __('posts.attributes.meta_title')) !!}
    {!! Form::text('meta_title', null, ['autocomplete' => 'off', 'class' => 'form-control' . ($errors->has('meta_title') ? ' is-invalid' : ''), 'placeholder' => 'Мета Заголовок', 'value' => '']) !!}

    @if ($errors->has('meta_title'))
        <span class="invalid-feedback">{{ $errors->first('meta_title') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('meta_description', __('posts.attributes.meta_description')) !!}
    {!! Form::text('meta_description', null, ['autocomplete' => 'off', 'class' => 'form-control' . ($errors->has('meta_description') ? ' is-invalid' : ''), 'placeholder' => 'Мета описание']) !!}

    @if ($errors->has('meta_description'))
        <span class="invalid-feedback">{{ $errors->first('meta_description') }}</span>
    @endif
</div>

<div class="form-group">
    @if (isset($tags))
        {!! Form::label('tags', __('posts.attributes.tags')) !!}
        {!! Form::text('tags', $tags, ['autocomplete' => 'off', 'class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Ключевые слова, через запятую', 'name' => 'tags']) !!}
        @if ($errors->has('tags'))
            <span class="invalid-feedback">{{ $errors->first('tags') }}</span>
        @endif
    @else
        {!! Form::label('tags', __('posts.attributes.tags')) !!}
        {!! Form::text('tags', null, ['autocomplete' => 'off', 'class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Ключевые слова, через запятую', 'name' => 'tags']) !!}
        @if ($errors->has('tags'))
            <span class="invalid-feedback">{{ $errors->first('tags') }}</span>
        @endif
    @endif
</div>

<div class="form-group">
    {!! Form::label('published', __('posts.attributes.published')) !!}
    {!! Form::select('published', [0 => 'не опубликованно', 1 => 'опубликованно'], null, ['class' => 'form-control' . ($errors->has('published') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('published'))
        <span class="invalid-feedback">{{ $errors->first('published') }}</span>
    @endif
</div>

<div class="form-group">
	{!! Form::label('category_id', __('posts.attributes.categories')) !!}
	{!! Form::select('category_id', $categories, null, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'required']) !!}
	@if ($errors->has('category_id'))
        <span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
    @endif
</div>

<style>
    .container {
        max-width: 1326px;
        padding-right: 0;
        padding-left: 0;
    }
    .editable p{
        padding: 10px 0;
        font-size: 21px;
        font-weight: 400;
        font-style: normal;
        line-height: 1.68;
        font-family: Vollkorn,serif;
    }
    .editable h2{
        line-height: 1.2em;
        font-weight: 700;
        font-size: 34px;
        margin-top: 40px;
        margin-bottom: .5rem;
        font-family: Roboto,sans-serif;
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
    .medium-insert-images-wide{
        margin: 10px -10%;
        border-radius: 3px;
        overflow: hidden;
    }
    .medium-insert-images-wide img {
        width: 100%;
    }
    .article__content p{
        padding: 10px 0;
        font-weight: 400;
        font-style: normal;
        line-height: 1.68;
        font-family: Vollkorn,serif;
    }
    blockquote, figure {
        margin: 0px 0px 1rem;
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

    .content-edit{
        padding-right:10px;
        padding-left:10px;
    }
</style>
<link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,700,700i" rel="stylesheet">
