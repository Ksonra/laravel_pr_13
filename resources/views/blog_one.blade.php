@extends('layouts.base')
@section('content')
<section class="blogs">
    <div class="container_blogs">
        <div class="image-block_blogs">
            <img src="{{asset('/storage/'.$blog->picture)}}" alt="Image">
        </div>
        <div class="content-block_blogs">
            <div class="content_news">
            <h3>{{ $blog->name }}</h3>
            <br>
            <h2>{!!$blog->content!!}</h2>
        </div>
            <div class="lower-content_blogs">
                <div class="post_btn">
                    <h3>Дата {{ optional($blog->created_at)->diffForHumans() }}</h3>
                    <a href="#"><i class="fas fa-user"></i>by admin</a>
                </div>
                {{-- <div class="btn_post">
                    <a href="{{asset('blog/' . $blog->id) }}" class="btn">Читать подробнее...</a>
                </div> --}}
             </div>
        </div>
    </div>

</section>
@endsection
