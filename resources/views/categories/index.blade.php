@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <a href="{{route('home')}}"><h3>Главная</h3></a>
    </div>
</div>

<div class="container">
    <div class="row">
        <ul>
        @foreach($categories as $category)
            <li><a href="{{route('categories.show', $category)}}">{{$category->name}}</a></li>
        @endforeach
        </ul>
    </div>
</div>
@endsection