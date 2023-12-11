@extends('layouts.base')
@section('content')
    <section class="category" id="category">
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
                    $summa = ($product->discount ? (float) ($product->price * $product->discount) / 100 : (float) $product->price) * $prod_count[$product->id];
                    $itogo += $summa;
                @endphp
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $prod_count[$product->id] }}</td>
                    <td>{{ $summa }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2">Итого</td>
                <td>{{$itogo}}</td>
            </tr>
        </table>
        <div class="grid grid-cols-2">
            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l flex flex-col">
                <label for="name" class="block">
                    <span class="text-gray-700">Имя</span>
                    <input class="block w-full mt-1 form-input" placeholder="Ваше имя" id="name" name="name"
                        type="text" autocomplete="off" required="">
                </label>

                <label for="email" class="block mt-4">
                    <span class="text-gray-700">Email</span>
                    <input class="block w-full mt-1 form-input" id="email" name="email" autocomplete="off"
                        type="email" required="">
                </label>

                <label for="phone" class="hidden sm:block mt-4">
                    <span class="text-gray-700">Телефон</span>
                    <input class="block w-full mt-1 form-input" id="phone" name="phone" autocomplete="off"
                        type="tel">
                </label>

            </div>
            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-r flex flex-col">
                <label class="block ">
                    <span class="text-gray-700">Комментарии к заказу: (необязательно)</span>
                    <textarea class="block w-full mt-1 form-textarea" wire:model="message" name="details" rows="3"
                        placeholder="Детали"></textarea>
                </label>

                <button
                    class="px-4 py-2 mt-8 font-semibold text-gray-800 bg-white border border-gray-300 rounded shadow hover:bg-gray-100">
                    Подтвердить заказ
                </button>
            </div>
        </div>
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

        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-warning btn-block btn-lg">Купить</button>
            </div>
        </div>
    </section>
@endsection
