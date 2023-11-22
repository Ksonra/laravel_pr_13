@extends('layouts.base')
@section('content')
    <section class="product" id="product">
        <h1 class="heading">Последние экземпляры</h1>
        <div class="box-container">
            @foreach ($products as $product)
            @include('includes.product_one')
            @endforeach
        </div>
    </section>
@endsection
