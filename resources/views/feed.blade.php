@extends('layouts.base')
@section('content')
    <section class="product" id="product">
        <h1> Новинки от Иринки</h1>
        <div class="box-container">
            @foreach ($feeds as $feed)
                <div class="box">
                    @if ($feed->model_name == 'Product')
                        @include('includes.product_one', ['product' => $feed->product])
                    @elseif($feed->model_name == 'Catalog')
                        @include('includes.catalog_one', ['catalog' => $feed->catalog])
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection


