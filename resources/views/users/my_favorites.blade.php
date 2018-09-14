@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-crumbs">
                    <ul class="bread-crumbs__list">
                        <li>
                            <a class="bread__link bread__home" href="{{route('home')}}">
                                Mebel.org
                            </a>
                        </li>
                        <li>
                            <a class="bread__link" href="">Блог</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="news-big-title">Избранное</h2>
            </div>
        </div>
        <div class="row">

            @include ('posts/_list_formatted',['posts'=>$myFavorites])

        </div>
    </div>
@endsection 
  