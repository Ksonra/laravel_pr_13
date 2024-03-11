@extends('layouts.base')
@section('content')
    <section class="product" id="product">
        <h1 class="heading text-left">
            @if (isset($all))
            Весь ассортимент
            @else
            Последние экземпляры
            @endif
        </h1>
        <div class="box-container">
            @foreach ($products as $product)
                @include('includes.product_one')
            @endforeach
        </div>
    </section>
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="fixed top-0 right-0 bg-green-500 text-white p-2 mt-4 mr-4 rounded z-20" x-show="showHardware"
                x-data="{ showHardware: true }">
                <div @click="showHardware = false">
                    {{ $error }}
                </div>
            </div>
        @endforeach
    @endif --}}

@endsection
