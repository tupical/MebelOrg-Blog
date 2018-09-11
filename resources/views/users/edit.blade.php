@extends('users.layout', ['tab' => 'profile'])

@section('main_content')
  <div class="card">
    <div class="card-body">
      <h1>@lang('users.profile')</h1>
      <hr class="my-4">

      {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update'], 'files' => true]) !!}

        <div class="form-group row">
          {!! Form::label('name', __('users.attributes.name'), ['class' => 'col-sm-2 col-form-label']) !!}

          <div class="col-sm-5">
            {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.name'), 'required']) !!}

            @if ($errors->has('name'))
                <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          {!! Form::label('email', __('users.attributes.email'), ['class' => 'col-sm-2 col-form-label']) !!}

          <div class="col-sm-5">
            {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => __('users.placeholder.email'), 'required']) !!}

            @if ($errors->has('email'))
                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
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

        <div class="form-group offset-sm-2">
          {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-success']) !!}
        </div>

      {!! Form::close() !!}
      
    </div>
  </div>

 @if(isset($user->image))
<div class="form-group">
    {{ Html::image(asset('/storage/images/avatar/' . $user->image), $user->image, [ 'width' => '100']) }}

    <button type="button" class="destroy_image">Delete</button> 	
</div>
@endif
 



@endsection
