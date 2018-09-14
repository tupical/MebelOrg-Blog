@extends('admin.layouts.app')

@section('content')

    <p>@lang('categories.show') : {{ link_to_route('categories.show', route('categories.show', $category), $category) }}</p>
    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' =>'PUT', 'files' => true]) !!}
        @include('admin/categories/_form', ['category' => $category])

        <div class="pull-left">
            {{ link_to_route('admin.categories.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit(__('forms.actions.update'), ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    {!! Form::model($category, ['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category], 'class' => 'form-inline pull-right', 'data-confirm' => __('forms.categories.delete')]) !!}
        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('categories.delete'), ['class' => 'btn btn-link text-danger', 'name' => 'submit', 'type' => 'submit']) !!}
    {!! Form::close() !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
        @if(isset($category))
        $(".destroy_image").click(function() {
        var fd = new FormData;
        fd.append('_method', 'DELETE');
        $.ajax({
            url: "/api/v1/categories/<?=$category->id?>/image?api_token={{auth()->user()->api_token}}",
            data: fd,
            method: 'POST',
            processData: false,
            contentType: false
        }).done(function(res) {
            if (res == '1')
            {
                location.reload();
            }
        });
        })
        @endif
    });
    </script>
@endsection