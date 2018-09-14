@if(isset($category->image))
<div class="form-group">
    {{ Html::image(asset('/storage/images/category/' . $category->image), $category->image, [ 'width' => '350']) }}

    <button type="button" class="destroy_image btn btn-link text-danger " ><i class="fa fa-trash" aria-hidden="true" ></i>Удалить картинку</button>
</div>
@endif

<div class="form-group">
    {!! Form::label('name', __('categories.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('featured_image', __('categories.attributes.featured_image')) !!} <br>
    {!! Form::file('featured_image') !!}

    @if ($errors->has('featured_image'))
        <span class="invalid-feedback">{{ $errors->first('featured_image') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('slug', __('categories.attributes.slug')) !!}
    {!! Form::text('slug', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'placeholder' => 'Автоматическая генерация', 'readonly' => true]) !!}

    @if ($errors->has('slug'))
        <span class="invalid-feedback">{{ $errors->first('slug') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('post_count', __('categories.attributes.post_count')) !!}
    {!! Form::text('post_count', null, ['class' => 'form-control' . ($errors->has('post_count') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('post_count'))
        <span class="invalid-feedback">{{ $errors->first('post_count') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('description', __('categories.attributes.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'required']) !!}
        
    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>




