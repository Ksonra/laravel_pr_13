@extends('layouts.base')
@section('content')
    <div class="float-left">
        @include('includes.filter_2')
    </div>
    <section class="category" id="category">
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
    </section>
@endsection
