@extends('layouts.base')
@section('content')
    <section class="category" id="category">
        <h1 class="heading">
            <a href="{{ asset('all/') }}"> Весь ассортимент </a>
            <a href="{{ asset('catalog/' . $product->catalog->id) }}"> <-{{ $product->catalog->name }} <-
                    {{ $product->name }} </a></h2>

                    <div class="container_blogs">
                        <div class="image-block_blogs">
                            <img src="{{ asset('/storage/' . $product->picture) }}" alt="">
                        </div>
                        <div class="content-block_blogs">
                            <div class="content_news">
                                <h3>{{ $product->name }}</h3>
                                <br>
                                <div>
                                    <h2>{!! $product->body !!}</h2>
                                </div>
                                <div>
                                    @if ($product->discount)
                                        <h2>{{ $product->price - ($product->price * $product->discount) / 100 }}$</h2>
                                    @else
                                        <h3 class="price">{{ $product->price }}$</h3>
                                    @endif
                                </div>
                            </div>
                                <div class="icons_one">
                                    <a href="#" class="fas fa-shopping-cart"></a>
                                    <a href="#" class="fas fa-heart"></a>
                                </div>
                        </div>
                    </div>
    </section>
@endsection
