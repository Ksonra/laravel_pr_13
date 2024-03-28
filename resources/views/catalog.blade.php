@extends('layouts.base')
@section('content')
<div class="float-left">
@include('includes.filter')
</div>
    <section class="category" id="category">

        <h2 class="heading text-left">
            <a href="{{ asset('/allproducts') }}"> Весь ассортимент </a>
        </h2>
        <h1 class="heading text-left"> {{ $catalog->name }} </h1>
        <section class="product" id="product">

            <div class="box-container">
                @foreach ($products as $product)
                    <div class="box">
                        <img src="/storage/{{ $product->picture }}" alt="" />
                        <div class="content">
                            <h2 class="text-2xl text-[#b25238]">{{ $product->name }}</h2>
                            <div class="icons">
                                <a href="{{ asset('favorite/' . $product->id . '/add') }}" class="fas fa-heart"></a>
                                <a href="{{ asset('add_cart/' . $product->id) }}" class="fas fa-shopping-cart"></a>
                            </div>
                            @if ($product->discount)
                                <h2 class="strike">{{ $product->price }}$</h2>
                                <h2>{{ $product->price - ($product->price * $product->discount) / 100 }}$</h2>
                            @else
                                <h3 class="price">{{ $product->price }}$</h3>
                            @endif
                            <a href="{{ asset('product/' . $product->id) }}" class="btn">Описание</a>
                        </div>
                    </div>
                @endforeach
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="fixed top-0 right-0 bg-red-500 text-white p-2 mt-4 mr-4 rounded z-20"
                            x-show="showHardware" x-data="{ showHardware: true }">
                            <div @click="showHardware = false">
                                {{ $error }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </section>
@endsection
