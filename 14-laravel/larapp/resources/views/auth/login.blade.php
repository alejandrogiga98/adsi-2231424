@extends('layouts.navbar')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <header class="block text-gray-700 text-2xl text-center font-bold bg-gray-300 mt-2 p-1.5 mb-5 rounded-md">
            {{__('general.title-login')}}
        </header>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <form method="POST" action="{{ route('login') }}">
            @csrf


            <!-- Email Address -->
            <div>
                <x-label for="email"/> @lang('general.label-email')

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                {{-- <x-label for="password" :value="__('Password')" /> --}}
                <x-label for="password" /> @lang('general.label-password')

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    {{-- <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span> --}}
                    {{-- <span class="ml-2 text-sm text-gray-600">{{ __('general.check-remember') }}</span> --}}
                    <span class="ml-2 text-sm text-gray-600"> @lang('general.check-remember') </span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{-- {{ __('Forgot your password?') }} --}}
                        @lang('general.a-forget')
                    </a>
                @endif

                <x-button class="ml-3 w-15">
                    {{-- {{ __('Log in') }} --}}
                    @lang('general.btn-login')
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection