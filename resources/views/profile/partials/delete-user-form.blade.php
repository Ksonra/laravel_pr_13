<section class="space-y-6">
    <header>
        <h2 class="text-red-500 text-4xl">
            {{ __('Внимание!') }}
        </h2>
<br>
        <p class="mt-1 text-red-500 text-2xl ">
            {{ __('После удаления учетной записи данные будут удалены без возможности восстановления.') }}
        </p>
    </header>

    <button
    class="btn bg-red-500 text-3xl mt-5"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Удалить') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Уверены в своем решении?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('После удаления вашей учетной записи все данные будут удалены без возможности восстановления.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Пароль') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Отмена') }}
                </x-secondary-button>

                <x-danger-button class="ml-3 p-10">
                    {{ __('Удалить') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
