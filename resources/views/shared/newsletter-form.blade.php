@auth
    {!! Form::open(['route' => 'newsletter-subscriptions.store', 'method' => 'post', 'class' => 'subscribe__form']) !!}
        {!! Form::text('email', null, ['class' => 'subscribe__input', 'placeholder' => __('newsletter.placeholder')]) !!}
        {!! Form::submit(__('newsletter.subscribe'), ['class' => 'subscribe__btn']) !!}
    {!! Form::close() !!}
@endauth
