<section>
    <header>
        <h2 class="font-medium text-[#b25238] text-4xl">
            {{ __('Обновить пароль') }}
        </h2>
<br>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="text-3xl mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Старый пароль')" />
            <x-text-input id="current_password" name="current_password" type="password" class="bg-[#fcf2e7]  mt-1 block w-full text-3xl" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Новый пароль')" />
            <x-text-input id="password" name="password" type="password" class="bg-[#fcf2e7] mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Повторить пароль')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="bg-[#fcf2e7] mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="btn">{{ __('Сохранить') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Сохранить') }}</p>
            @endif
        </div>
    </form>
</section>
