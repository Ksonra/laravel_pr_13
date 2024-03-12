@extends('layouts.base')
@section('content')
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $maintext->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="p-6 text-gray-900">
                    {!! $maintext->body!!}
                </div>
            </div>
        </div>
    </div>
    @endsection
