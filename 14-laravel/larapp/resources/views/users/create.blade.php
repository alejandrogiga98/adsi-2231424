@extends('layouts.navbar')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        {{-- Back to Users --}}
        <a href="{{ url('users') }}"><- User Module</a>
        
        <header class="block text-gray-700 text-2xl text-center font-bold bg-gray-300 mt-2 p-1.5 mb-5 rounded-md">
            {{__('general.title-register')}}
        </header>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ url('users') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="fullname"/> @lang('general.label-fullname')

                <x-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus />
            </div>

                <!-- Email Address -->
                <div class="mt-4">
                <x-label for="email"/>@lang('general.label-email')

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" min='1960-01-01' max='1999-12-31' required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone"/> @lang('general.label-phone')

                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
            </div>

           <!-- Birthdate -->
           <div class="mt-4">
               <x-label for="date"/>@lang('general.label-date')

               <x-input id="date" class="block mt-1 w-full" type="date" name="birthdate" :value="old('date')" required />
            </div>

            <!-- Gender -->
            <div class="mt-4">
               <x-label for="gender"/>@lang('general.label-gender')
               <select name="gender" id="gender" class="block mt-1 w-full rounded-md border border-red-500" required>
                  <option value="" @if(!old('gender')) selected @endif disabled>---</option>
                  <option value="Male" @if(old('gender') == 'Male') selected @endif> @lang('general.label-gender-male') </option>
                  <option value="Female" @if(old('gender') == 'Female') selected @endif> @lang('general.label-gender-female') </option>
               </select>
            </div>

            <!-- address -->    
            <div class="mt-4">
                <x-label for="address"/>@lang('general.label-address')

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
            </div>

            <!-- Role -->
            <div class="mt-4">
               <x-label for="role"/> Role
               <select name="role" id="role" class="block mt-1 w-full rounded-md border border-red-500" required>
                   <option value="" @if(!old('role')) selected @endif disabled>---</option>
                   <option value="Admin" @if(old('role') == 'Male') selected @endif> Admin </option>
                   <option value="Customer" @if(old('role') == 'Female') selected @endif> Customer </option>
               </select>

               @error('role')
               <p class="text-red-500 text-xs italic mt-4">
                  {{ $message }}
               </p>
               @enderror
           </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password"/>@lang('general.label-password')

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" />  @lang('general.label-confirm-password')

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-center mt-4">
               
                <x-button class="ml-4">
                    {{-- {{ __('Register') }} --}}
                    Add User
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection