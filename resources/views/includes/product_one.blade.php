<div class="box">
    @if ($product->discount)
    <span class="discount">-{{$product->discount}}%</span>
    @endif
    <div class="icons">
        <a href="{{ asset('favorite/' . $product->id . '/add') }}" class="fas fa-heart"></a>
        <a href="{{asset('add_cart/'.$product->id)}}" class="fas fa-shopping-cart"></a>
    </div>
    <img src="{{asset('/storage/'.$product->picture)}}" alt="Image">
    <h3>{{$product->name}}</h3>
    <div class="quantity">
    </div>
    <div class="price">${{$product->price}}
        @if ($product->discount)
        <span>${{$product->price-(($product->price*$product->discount)/100)}}</span>
        @endif
    </div>
    <a href="{{asset('product/'.$product->id)}}" class="btn">Подробнее о товаре</a>
</div>

