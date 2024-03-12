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
            <table>
                <tr>
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
            <div class="grid grid-cols-2">
                <div class="p-6 border border-yellow-200 dark:border-yellow-700 md:border-l flex flex-col">
                    <label for="name" class="block">
                        {{-- <span class="text-gray-700">Имя</span> --}}
                        @if ($errors->has('name'))
                            {{ $errors->first('name') }}
                        @endif
                        <input class="block w-full mt-1 form-input" placeholder="Имя" id="name" name="name"
                            type="text" autocomplete="off" required="">
                    </label>

                    <label for="email" class="block mt-4">
                        {{-- <span class="text-gray-700">Email</span> --}}
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @endif
                        <input class="block w-full mt-1 form-input" id="email" name="email" placeholder="Email"
                            autocomplete="off" type="email" required="">
                    </label>

                    {{-- <div class="form-group">
                        <label class="sr-only" for="examplePhone">+375 (__) ___–__–__</label>
                        <!--<input name="phone" required type="text" pattern="\+375\([0-9]{2}\)[0-9 -]{6,12}"
                               class="form-control headform input-lg" id="examplePhone"
                               value="+375() ">-->
                        <input type="tel"  name="phone" class="form-control headform input-lg user_phone" id="examplePhone" required pattern="\+375\([0-9]{2}\)[0-9 -]{6,12}" placeholder="+375(__) ___ __ __" title="Формат: (096) 999 99 99" />
                    </div> --}}

                    <label for="phone" class="hidden sm:block mt-4">
                        {{-- <span class="text-red-600">Телефон</span> --}}
                        @if ($errors->has('phone'))
                            {{ $errors->first('phone') }}
                        @endif
                        <input class="block w-full mt-1 form-input" id="phone" name="phone"
                            placeholder="+375(__) ___ __ __" autocomplete="off" type="tel">
                    </label>

                </div>
                <div class="p-6 border border-yellow-200 dark:border-yellow-700 md:border-r flex flex-col">
                    <label class="block ">
                        {{-- <span class="text-gray-700">Комментарии к заказу: (необязательно)</span> --}}
                        <textarea class="block w-full mt-1 form-textarea" placeholder="Комментарии к заказу: (необязательно)"
                            wire:model="message" name="details" rows="3" placeholder="Детали"></textarea>
                    </label>

                    <button class="btn">
                        Подтвердить заказ
                    </button>
                </div>
            </div>
            <div class="out"></div>
            {{-- <div class="card mb-4">
        <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
                <input type="text" id="form1" class="form-control form-control-lg" />
                <label class="form-label" for="form1">
                    <h2>Подарочный код</h2>
                </label>
            </div>
            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
        </div>
    </div> --}}
            {{--
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-warning btn-block btn-lg">Купить</button>
                </div> --}}
            </div>
        </form>
    </section>
@endsection
