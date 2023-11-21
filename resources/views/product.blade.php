@extends('layouts.base')
@section('content')
<section class="category" id="category">
    <h1 class="heading"> {{$product->name}} </h1>

    <div class="box-container">
        <div>
           {!!$product->body!!}
           <img src="{{asset('/storage/'.$product->picture)}}" alt="">
        </div>
    </div>
  </section>
@endsection
