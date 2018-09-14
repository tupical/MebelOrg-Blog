

<table class="table table-striped table-sm table-responsive-md">
    
    <thead>
        <tr>
            <th>@lang('categories.attributes.name')</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{ $category->slug}}</td>
                <td>
                    <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>

                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    {!! Form::model($category, ['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category], 'class' => 'form-inline', 'data-confirm' => __('forms.categories.delete')]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>