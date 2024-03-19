<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('layouts.base')
@section('content')
    <section class="category" id="category">
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <div class="text-red-600">{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form action="{{ asset('cart/form_save') }}" method="POST">
            @csrf
            <table class="mb-16 table table-striped text-[#b25238] text-2xl">
                <tr class="text-[#b25238] text-2xl">
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
                @php
                    $itogo = 0;
                @endphp
                @foreach ($prod_arr as $product)
                    @php
                        if (
                            isset($_COOKIE['random_id_' . $product->id]) &&
                            $_COOKIE['random_id_' . $product->id] == $product->id
                        ) {
                            $summa = 100 * $prod_count[$product->id];
                        } else {
                            $summa =
                                ($product->discount
                                    ? (float) ($product->price * $product->discount) / 100
                                    : (float) $product->price) * $prod_count[$product->id];
                        }
                        $itogo += $summa;
                    @endphp
                    <input type="hidden" name="product[{{ $product->id }}]" value="{{ $prod_count[$product->id] }}">
                    <tr>
                        <td>
                            @if (isset($_COOKIE['random_id_' . $product->id]) && $_COOKIE['random_id_' . $product->id] == $product->id)
                                Секретный товар
                            @else
                                {{ $product->name }}
                            @endif
                        </td>
                        <td>{{ $prod_count[$product->id] }}</td>
                        <td>{{ $summa }}</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="2">Итого</td>
                    <td>{{ $itogo }}</td>
                </tr>
            </table>
            <div class="bg-[#fcf2e7] grid grid-cols-2">
                <div class="p-6 border border-orange-100 hover:border-[#b25238] md:border-l flex flex-col">
                    <label for="name" class="block">
                        {{-- <span class="text-gray-700">Имя</span> --}}
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @endif
                        <input class="text-2xl block w-full mt-1 form-input" placeholder="Имя" id="name" name="name"
                            type="text" autocomplete="off" required="">
                    </label>

                    <label for="email" class="block mt-4">
                        {{-- <span class="text-gray-700">Email</span> --}}
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                        <input class="text-2xl block w-full mt-1 form-input" id="email" name="email" placeholder="Email"
                            autocomplete="off" type="email" required="">
                    </label>

                    <label for="phone" class="hidden sm:block mt-4">
                        {{-- <span class="text-red-600">Телефон</span> --}}
                        @if ($errors->has('phone'))
                            {{ $errors->first('phone') }}
                        @endif
                        <input class="text-2xl block w-full mt-1 form-input" id="phone" name="phone"
                            placeholder="+375(__) ___ __ __" autocomplete="off" type="tel">
                    </label>

                </div>
                <div class="p-6 border border-yellow-200 dark:border-yellow-700 md:border-r flex flex-col">
                    <label class="block ">
                        {{-- <span class="text-gray-700">Комментарии к заказу: (необязательно)</span> --}}
                        <textarea class="text-[#b25238] text-2xl block w-full mt-1 form-textarea" placeholder="Комментарии к заказу: (необязательно)"
                            wire:model="message" name="details" rows="3" placeholder="Детали"></textarea>
                    </label>

                    <button class="btn">
                        Подтвердить заказ
                    </button>
                </div>
            </div>
            <div class="out"></div>
        </form>
    </section>
@endsection
