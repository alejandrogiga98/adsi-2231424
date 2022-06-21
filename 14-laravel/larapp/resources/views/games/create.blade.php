@extends('layouts.navbar')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        {{-- Back to games --}}
        <a href="{{ url('games') }}"><- Game Module</a>
        
        <header class="block text-gray-700 text-2xl text-center font-bold bg-gray-300 mt-2 p-1.5 mb-5 rounded-md">
            {{__('general.title-register')}}
        </header>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ url('games') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name"/> @lang('general.label-fullname')
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label for="description"/>@lang('general.label-description')
                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" max='200' required />
            </div>

            <!-- User Id -->
            <div class="mt-4">
               <x-label for="user"/>@lang('general.label-user')
               <select name="user" id="user" class="block mt-1 w-full rounded-md border border-red-500" required>
                  <option value="" @if(!old('user')) selected @endif disabled>---</option>
                  <option value="Male" @if(old('user') == 'User 1') selected @endif> {{-- @lang('general.label-gender-male') --}} User 1 </option>
                  <option value="Female" @if(old('user') == 'User 2') selected @endif> {{-- @lang('general.label-gender-female') --}} User2 </option>
               </select>
            </div>

            <!-- Category Id -->
            <div class="mt-4">
                <x-label for="category"/>@lang('general.label-category')
                <select name="category" id="category" class="block mt-1 w-full rounded-md border border-red-500" required>
                   <option value="" @if(!old('category')) selected @endif disabled>---</option>
                   <option value="Male" @if(old('category') == 'category 1') selected @endif> {{-- @lang('general.label-gender-male') --}} category 1 </option>
                   <option value="Female" @if(old('category') == 'category 2') selected @endif> {{-- @lang('general.label-gender-female') --}} category2 </option>
                </select>
             </div>

            <!-- Slider Id -->
            <div class="mt-4">
                <x-label for="slider"/>Slider
                <select name="slider" id="slider" class="block mt-1 w-full rounded-md border border-red-500" required>
                   <option value="" @if(!old('slider')) selected @endif disabled>---</option>
                   <option value="Male" @if(old('slider') == '1') selected @endif> active </option>
                   <option value="Female" @if(old('slider') == '0') selected @endif> innactive </option>
                </select>
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-label for="price"/> @lang('general.label-price')
                <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" min="0" max="69.99" required />
            </div>

            <div class="flex items-center justify-center mt-4">      
                <x-button class="ml-4">
                    {{-- {{ __('Register') }} --}}
                    Add Game
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection