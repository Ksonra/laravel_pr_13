@extends('layouts.base')
@section('content')
<section class="blogs">
    <h1 class="title">our daily posts</h1>
    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/blog-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>{{$blog->name}}</h3>
                <p>{{$blog->annotation}}</p>

                {!!$blog->content!!}

                <div class="icons">
                    <p> Дата {{optional($blog->created_at)->diffForHumans()}}</p>
                    <a href="#"><i class="fas fa-user"></i>by admin</a>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection
