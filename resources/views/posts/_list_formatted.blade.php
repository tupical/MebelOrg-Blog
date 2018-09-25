@if(count($posts))
    @php $key=0; @endphp
    @php $tri_v_ryad=0; @endphp
    @php $resized=0; @endphp

    @if(count($posts)<=2)
        @foreach($posts as $post)
            <div class="col-lg-5 col-md-7 col-12 order-{{$key}}"> @include ('posts/_list__post_big') </div>
            @php $key++; @endphp
        @endforeach
    @else


    @foreach($posts as $post)
        @if($key==10||$key==21||$key==22) @php $resized = 1; @endphp <div data-ryad="{{$tri_v_ryad}}" data-key="{{$key}}" class="col-lg-6 col-sm-6 col-12 order-1"> @include ('posts/_list__post_long') </div>  @php $tri_v_ryad++; @endphp @endif
        @if($key==0||$key==19) @php $resized = 1; @endphp <div data-ryad="{{$tri_v_ryad}}" data-key="{{$key}}" class="col-lg-5 col-md-7 col-12 order-1"> @include ('posts/_list__post_big') </div> @endif
        @if($key==1||$key==17) @php $resized = 1; @endphp <div data-ryad="{{$tri_v_ryad}}" data-key="{{$key}}" class="col-lg-4 col-md-5 col-12 order-1"> @include ('posts/_list__post_average') @endif
        @if($key==2||$key==18) @php $resized = 1; @endphp @include ('posts/_list__post_average') </div>   @endif

        @if(!$resized)
            <div data-ryad="{{$tri_v_ryad}}" data-key="{{$key}}" class="col-lg-3 col-sm-6 col-12 order-1"> @include ('posts/_list__post_short') </div>
        @endif

        @if($tri_v_ryad == 2)
            <div data-ryad="{{$tri_v_ryad+1}}" class="col-lg-3 col-0 order-lg-1 order-2"></div> @php $tri_v_ryad=0; @endphp
        @else
            @php $tri_v_ryad++; @endphp
        @endif

        @php $resized = 0; @endphp
        @php $key++; @endphp
        @if($key==24) @php $key=0; @endphp @endif
    @endforeach

    @endif
@else
    <p>Nothing</p>
@endif