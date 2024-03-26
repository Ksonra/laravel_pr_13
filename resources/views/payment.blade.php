@extends('layouts.base')
@section('content')

    <section class="mt-5 category" id="category">
        <section class="product" id="product">
            <div class="box-container">
                @foreach ($favorites as $favorite)
                
                    {{-- <div class="box">
                        <img src="/storage/{{ $favorite->product->picture }}" alt="" />
                        <div class="content">
                            <h2>{{ $favorite->product->name }}</h2>
                            <div class="icons">
                                <a href="{{ asset('favorite/' . $favorite->id . '/del') }}" class="fas fa-times"></a>
                                <a href="{{ asset('add_cart/' . $favorite->product->id) }}" class="fas fa-shopping-cart"></a>
                            </div>
                            @if ($favorite->product->discount)
                                <h2 class="strike">{{ $favorite->product->discount}}$</h2>
                                <h2>{{ $favorite->product->price - ($favorite->product->price * $favorite->product->discount) / 100 }}$</h2>
                            @else
                                <h3 class="price">{{ $favorite->product->price }}$</h3>
                            @endif
                            <a href="{{ asset('product/' . $favorite->product->id) }}" class="btn">Описание</a>
                        </div>

                    </div> --}}
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
    <div class="out"></div>
    </div>
@endsection
