@extends('layouts.base')
@section('content')
<section class="category" id="category">
    <h1 class="heading">
        <a href="{{asset('all/')}}"> Весь ассортимент </a>
        <a href="{{asset('catalog/'.$product->catalog->id)}}"> <-{{$product->catalog->name}} <- {{$product->name}} </a></h2>
    <div class="box-container">
        <div>
           {!!$product->body!!}
           <img src="{{asset('/storage/'.$product->picture)}}" alt="">
        </div>
    </div>
  </section>
@endsection
