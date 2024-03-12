@extends('layouts.base')
@section('content')
    <section class="blogs">
        <div class="container_blogs">
            <div class="image-block_blogs">
                <img src="{{ asset('/storage/' . $blog->picture) }}" alt="Image">
            </div>
            <div class="content-block_blogs">
                <div class="content_news">
                    <h1>{{ $blog->name }}</h1>
                    <h2>{!! $blog->content !!}</h2>
                </div>
                {{-- <div class="lower-content_blogs"> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
