<form action="{{ asset('allproducts') }}" method="get">
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
                <input name="discount" class="form-check-input" type="checkbox" value="1" id="discount"
                    @if (request()->has('discount')) @if (request()->get('discount') == 1)
                         @checked(true) @endif
                    @endif
                >
                <label class="form-check-label" for="discount">
                    Скидки
                </label>
            </div>
            <div class="fil_2 focus-[#fcf2e7]">
                <select class="border-[#b25238] bg-[#fcf2e7] size-3/6 pl-2 text-[#bf6547] hover:bg-[#fcf2e7]" name="categories" id="categories">
                    <option value="">Категории </option>
                    @foreach ($catalogs as $catalog)
                        <option value="{{ $catalog->id }}"
                            @if (request()->get('categories')) @if (request()->get('categories') == $catalog->id)
                                @selected(true) @endif
                            @endif
                            >
                            {{ $catalog->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center text-2xl mt-2 ">
                <button class="btn2">Найти</button>
            </div>
            <div class="btn2"><a href="{{ asset('allproducts') }}">Сбросить</a></div>
        </div>
    </div>
</form>
