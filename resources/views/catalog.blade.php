@extends('layouts.base')
@section('content')
    <form action="{{ asset('catalog/' . $catalog->id) }}" method="get">
        <div class="container_filter text-2xl">
            <div class="filter">
                <br>
                <div class="ml-2 grid grid-cols-2">
                    <div>
                        <div x-data="{ price: {{ $min_price }} }" class="w-full">
                            <label for="price" class="font-bold text-gray-600 block text-left"
                                x-text="'от'  + price"></label>
                            <input type="range" min="{{ $min_price }}" name="price_min" max="{{ $avg_price }}"
                                x-model="price" class="w-full h-2 bg-yellow-100 appearance-none" />
                        </div>
                    </div>
                    <div>
                        <div x-data="{ price: {{ $max_price }} }" class="w-full">
                            <label for="price" class="font-bold text-gray-600 block text-right"
                                x-text="'до'  + price"></label>
                            <input type="range" min="{{ $avg_price }}" name="price_max" max="{{ $max_price }}"
                                x-model="price" class="w-full h-2 bg-yellow-100 appearance-none" />
                        </div>
                    </div>
                </div>

                <div class="w-full text-center text-2xl mt-2">
                    <button class="btn2">Сортировать по цене</button>
                </div>

                <div class="text-3xl form-check mt-10 mb-10">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        В наличии
                    </label>
                </div>

                <div class="form-check mt-10 mb-10">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label  text-red-700 text-3xl" for="defaultCheck1">
                        <b>SALE</b>
                    </label>
                </div>

                <div class="text-center text-2xl mt-2 ">
                    <button class="btn2">Сбросить</button>
                </div>

            </div>

    </form>
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
                            <h2>{{ $product->name }}</h2>
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
    </div>
@endsection
