@extends('layouts.base')
@section('content')
<section class="category" id="category">

    <section class="grid grid-flow-col h-100" style="background-color: #eee;">
        <form action="{{ asset('cart/form_order') }}" method="GET">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 ml-1 text-[#b25238] text-2xl">Корзина заказа:</h3>

                        </div>

                        <div x-data="{
                            'itogo': {{ $itogo }},
                            async itogo_func() {
                                let summa = 0;
                                @foreach ($products as $product)
                                @if (isset($_COOKIE['random_id_' . $product->id]) && $_COOKIE['random_id_' . $product->id] == $product->id)
                                let my_var += 100;
                                summa += my_var;
                                @else
                                let my_var += (document.getElementById('product{{ $product->id }}').value) *{{ $product->discount ? (float) ($product->price * $product->discount) / 100 : (float) $product->price }};
                                summa += my_var;
                                @endif

                                @endforeach
                                this.itogo = summa;
                            },
                        }">
                            @foreach ($products as $product)
                                <div class="card rounded-3 mb-4" x-data="{
                                    async change_count_{{ $product->id }}() {
                                            this.summa{{ $product->id }} = {{ $product->discount ? (float) ($product->price * $product->discount) / 100 : (float) $product->price }} * this.count{{ $product->id }}
                                            console.log(this.summa{{ $product->id }});
                                        },
                                        'summa{{ $product->id }}': '{{ isset($_COOKIE['random_id_' . $product->id]) && $_COOKIE['random_id_' . $product->id] == $product->id ? '100' : ($product->discount ? (float) ($product->price * $product->discount) / 100 : (float) $product->price) }}',
                                        'count{{ $product->id }}': 1
                                }">

                                    <div class="card-body p-4 text-[#b25238] text-2xl">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="{{ asset(isset($_COOKIE['random_id_' . $product->id]) && $_COOKIE['random_id_' . $product->id] == $product->id ? '/images/blackbox.png' : 'storage/' . $product->picture) }}"
                                                    class="img-fluid rounded-3" />
                                            </div>
                                            <div class="col-xs-3 col-md-3 col-lg-3 col-xl-3">
                                                <p class="text-[#b25238] text-2xl">
                                                    @if (isset($_COOKIE['random_id_' . $product->id]) && $_COOKIE['random_id_' . $product->id] == $product->id)
                                                        Секретный товар
                                                    @else
                                                        {{ $product->name }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2"
                                                    @click.prevent="count{{ $product->id }}--;
                                                change_count_{{ $product->id }}();
                                                itogo_func();">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="product{{ $product->id }}" min="1" max="100"
                                                    name="product_{{ $product->id }}" type="text"
                                                    class="form-control form-control-xs text-2xl text-[#b25238] border-[#ebdcb2]"
                                                    @change="change_count_{{ $product->id }}; itogo_func();"
                                                    x-model="count{{ $product->id }}" autocomplete="off" />
                                                <button class="btn btn-link px-2"
                                                    @click.prevent="count{{ $product->id }}++;
                                                change_count_{{ $product->id }}();
                                                itogo_func();">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <div class="price" x-text = 'summa{{ $product->id }}'>

                                                </div>

                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="{{ asset('cart/delete/' . $product->id) }}" class="text-danger"><i
                                                        class="fas fa-trash fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn bg-[#e4a436] hover:bg-[#b25238] ml-3 text-white text-2xl">Продолжить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

</section>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endpush
