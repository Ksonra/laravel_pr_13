@extends('layouts.base')
@section('content')
    <form action="{{ asset('catalog/' . $catalog->id) }}" method="get">
        <div class="container_filter">
            <div class="filter">
                <br>
                {{-- <div class="grid grid-cols-2">
                    <div class="">
                        <div x-data="{ price: {{(request()->price_min)?request()->price_min:$min_price}} }" class="w-full">
                            <label for="price" class="font-bold text-gray-700" x-text="'от'  + price"></label>
                            <input type="range" min="{{ $min_price }}" name="price_min" max="{{ $avg_price }}"
                                x-model="price" class="w-full h-2 bg-blue-100 appearance-none"/>
                        </div>
                    </div>
                    <div>
                        <div x-data="{ price: {{(request()->price_max)?request()->price_max:$max_price}}}" class="w-full">
                            <label for="price" class="font-bold text-gray-700 block text-right"
                                x-text="'до'  + price"></label>
                            <input type="range" min="{{ $avg_price }}" name="price_max" max="{{ $max_price }}"
                                x-model="price" class="w-full h-2 bg-blue-100 appearance-none"/>
                        </div>
                    </div>
                </div>
                <div class="text-center text-sm mt-2">
                    <button type="submit" class="btn2">Сортировать по цене</button>
                </div> --}}
            </div>
    </form>
    <section class="category" id="category">

        <div class="grid grid-cols-2">
            <div class="">
                <div x-data="{ price: {{(request()->price_min)?request()->price_min:$min_price}} }" class="w-full">
                    <label for="price" class="font-bold text-gray-700" x-text="'от'  + price"></label>
                    <input type="range" min="{{ $min_price }}" name="price_min" max="{{ $avg_price }}"
                        x-model="price" class="w-full h-2 bg-yellow-100 appearance-none"/>
                </div>
            </div>
            <div>
                <div x-data="{ price: {{(request()->price_max)?request()->price_max:$max_price}}}" class="w-full">
                    <label for="price" class="font-bold text-gray-700 block text-right"
                        x-text="'до'  + price"></label>
                    <input type="range" min="{{ $avg_price }}" name="price_max" max="{{ $max_price }}"
                        x-model="price" class="w-full h-2 bg-yellow-100 appearance-none"/>
                </div>
            </div>
        </div>
        <div class="text-center text-sm mt-2">
            <button type="submit" class="btn2">Сортировать по цене</button>
        </div>

        <h1 class="heading"> {{ $catalog->name }} </h1>

        <div class="box-container">
            @foreach ($products as $product)
                <div class="box">
                    <img src="/storage/{{ $product->picture }}" alt="" />{{-- <img src="images/Броши.png" alt="" /> --}}
                    <div class="content">
                        <h2>{{ $product->name }}</h2>
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

        </div>
    </section>
    </div>
@endsection
