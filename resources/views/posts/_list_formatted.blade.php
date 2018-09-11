@if(count($posts))
    @php $key=0; @endphp
    @foreach($posts as $post)
        @if($key==10) <div class="col-lg-6 col-sm-6 col-12 order-{{$key}}"> @include ('posts/_list__post_long') </div> @php $key++; @endphp @endif
        @if($key==0) <div class="col-lg-5 col-md-7 col-12 order-{{$key}}"> @include ('posts/_list__post_big') </div> @endif
        @if($key==1||$key==18) <div class="col-lg-4 col-md-5 col-12 order-{{$key}}"> @include ('posts/_list__post_average') @endif
        @if($key==2||$key==19) @include ('posts/_list__post_average') </div> <div class="col-lg-3 col-0 order-lg-{{$key}} order-12"></div> @endif
        @if($key!=0&&$key!=1&&$key!=2&&$key!=10&&$key!=18&&$key!=19&&$key!=20) <div class="col-lg-3 col-sm-6 col-12 order-{{$key}}"> @include ('posts/_list__post_short') </div>@if($key % 5 == 0) @php $key++; @endphp  <div class="col-lg-3 col-0 order-lg-{{$key}} order-12"></div> @endif @endif
        @php $key++; @endphp
    @endforeach

@else
    <p>Nothing</p>
@endif