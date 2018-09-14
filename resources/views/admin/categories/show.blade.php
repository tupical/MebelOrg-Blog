@extends('admin.layouts.app')
@section('content')
@if(isset($category->image))
<div class="form-group">
    {{ Html::image(asset('/storage/images/category/' . $category->image), $category->image, [ 'width' => '350']) }}


</div>
@endif

    <div class="container">
        <div class="row">   
            <p>{{$category->name}}</p>
        </div>
        <div class="row">
            <p>{{$category->description}}</p>
        </div>
    </div>
    <div class="pull-left">
            {{ link_to_route('admin.categories.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
    </div>
@endsection