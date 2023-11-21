@extends('layouts.base')
@section('content')
<section class="blogs">
    <h3 class="title">our daily posts</h3>
    <div class="box-container">
@foreach($blogs as $blog)
        <div class="box">
            <div class="image">
                <img src="images/blog-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>{{$blog->name}}</h3>
                <p>{{$blog->annotation}}</p>
                <a href="{{asset('blog/'.$blog->id)}}" class="btn">Читать подробнее...</a>
                <div class="icons">
                    <p> Дата {{optional($blog->created_at)->diffForHumans()}}</p>
                    <a href="#"><i class="fas fa-user"></i>by admin</a>

                </div>
            </div>
        </div>
    </div>
@endforeach

<div>
    {!!$blogs->links()!!}
</div>

</section>
@endsection
