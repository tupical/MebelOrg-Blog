<table class="table table-striped table-sm">
    <caption>{{ trans_choice('users.count', $users->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('users.attributes.name')</th>
            <th>@lang('users.attributes.email')</th>
            <th>@lang('users.attributes.posts')</th>
            <th>@lang('users.attributes.post_view')</th>
            <th>@lang('users.attributes.registered_at')</th>
            
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <?php $index = $user->id;?>
            <tr>
                <td>{{ link_to_route('admin.users.edit', $user->fullname, $user) }}</td>
                <td>{{ $user->email }}</td>
                <td>@if (isset($total[$user->id])){{$total[$user->id]}} @else 0 @endif</td>
                <td>@if (isset($posts[$user->id])){{$posts[$user->id]}} @else 0 @endif</td>
                <td>{{ humanize_date($user->registered_at, 'd/m/Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
