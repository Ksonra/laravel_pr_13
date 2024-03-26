@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-2xl text-[#b25238]']) }}>
    {{ $value ?? $slot }}
</label>
