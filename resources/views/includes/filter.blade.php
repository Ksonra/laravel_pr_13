<form action="{{ asset('catalog/' . $catalog->id) }}" method="get">
    <div class="container_filter text-2xl">
        <div class="filter">
            <br>
            <div class="ml-2 grid grid-cols-2">
                <div>
                    <div x-data="{ price: {{ $min_price }} }" class="w-full">
                        <label for="price" class="font-bold text-gray-600 block text-left"
                            x-text="'от'  + price"></label>
                        <input type="range" min="{{ $min_price }}" name="price_min" max="{{ $avg_price }}"
                            x-model="price" class="w-full h-2 bg-yellow-100 appearance-none" />
                    </div>
                </div>
                <div>
                    <div x-data="{ price: {{ $max_price }} }" class="w-full">
                        <label for="price" class="font-bold text-gray-600 block text-right"
                            x-text="'до'  + price"></label>
                        <input type="range" min="{{ $avg_price }}" name="price_max" max="{{ $max_price }}"
                            x-model="price" class="w-full h-2 bg-yellow-100 appearance-none" />
                    </div>
                </div>
            </div>
            <div class="w-full text-center text-2xl mt-2">
                <button class="btn2">Сортировать по цене</button>
            </div>
            <div class="text-3xl form-check mt-10 mb-10">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    В наличии
                </label>
            </div>
            <div class="form-check mt-10 mb-10">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label  text-red-700 text-3xl" for="defaultCheck1">
                    <b>SALE</b>
                </label>
            </div>
            <div class="text-center text-2xl mt-2 ">
                <button class="btn2">Сбросить</button>
            </div>
        </div>
    </div>
</form>
