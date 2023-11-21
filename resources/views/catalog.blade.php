@extends('layouts.base')
@section('content')


  <section class="category" id="category">
    <br>

    <h1 class="heading"> {{$catalog->name}} </h1>

    <div class="box-container">
        @foreach ($catalog->products as $product)


      <div class="box">
        <img src="/storage/{{$product->picture}}" alt="" />{{-- <img src="images/Броши.png" alt="" /> --}}
        <div class="content">
          <h2>{{$product->name}}</h2>
          @if ($product->discount)
          <h2 class="strike">{{$product->price}}$</h2>
          <h2>{{$product->price-(($product->price*$product->discount)/100)}}$</h2>
          @else
          <h3 class="price">{{$product->price}}$</h3>
          @endif
          <a href="{{asset('product/'.$product->id)}}" class="btn">Описание</a>
        </div>
      </div>
      @endforeach

    </div>
  </section>


@endsection
