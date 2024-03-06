@extends('layouts.base')
@section('content')
    <section class="category" id="category">
        <h1 class="heading">
            <a href="{{ asset('all/') }}"> Весь ассортимент </a>
            <a href="{{ asset('catalog/' . $product->catalog->id) }}"> <-{{ $product->catalog->name }} <-
                    {{ $product->name }} </a></h2>





                    <section class="product" id="product">
                        <div class="box-container">
                            <div class="box">
                                {!! $product->body !!}
                                <img src="{{ asset('/storage/' . $product->picture) }}" alt="">
                            </div>

                                <div class="icons">
                                    <a href="#" class="fas fa-shopping-cart"></a>
                                    <a href="#" class="fas fa-heart"></a>
                                </div>

                        </div>
                    </section>
    </section>
@endsection
