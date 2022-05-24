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
            {{ __('Edit User') }}
        </header>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ url('users/' . $user->id) }}">
            @csrf
            @method('put')

            <!-- Name -->
            <div>
                <x-label for="fullname"/> @lang('general.label-fullname')

                <x-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname', $user->fullname)" required autofocus />
            </div>

                <!-- Email Address -->
                <div class="mt-4">
                <x-label for="email"/>@lang('general.label-email')

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" min='1960-01-01' max='1999-12-31' required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone"/> @lang('general.label-phone')

                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone', $user->phone)" required />
            </div>

           <!-- Birthdate -->
           <div class="mt-4">
               <x-label for="date"/>@lang('general.label-date')

               <x-input id="date" class="block mt-1 w-full" type="date" name="birthdate" :value="old('date', $user->birthdate)" required />
            </div>

            <!-- Gender -->
            <div class="mt-4">
               <x-label for="gender"/>@lang('general.label-gender')
               <select name="gender" id="gender" class="block mt-1 w-full rounded-md border border-red-500" required>
                  <option value="" @if(!old('gender', $user->gender)) selected @endif disabled>---</option>
                  <option value="Male" @if(old('gender', $user->gender) == "Male") selected @endif> @lang('general.label-gender-male') </option>
                  <option value="Female" @if(old('gender', $user->gender) == "Female") selected @endif> @lang('general.label-gender-female') </option>
               </select>
            </div>

            <!-- address -->    
            <div class="mt-4">
                <x-label for="address"/>@lang('general.label-address')

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $user->address)" required autofocus />
            </div>

            <!-- Role -->
            <div class="mt-4">
               <x-label for="role"/> Role
               <select name="role" id="role" class="block mt-1 w-full rounded-md border border-red-500" required>
                   <option value="" @if(!old('role', $user->role)) selected @endif disabled>---</option>
                   <option value="Admin" @if(old('role', $user->role) == 'Male') selected @endif> Admin </option>
                   <option value="Customer" @if(old('role', $user->role) == 'Female') selected @endif> Customer </option>
               </select>

               @error('role')
               <p class="text-red-500 text-xs italic mt-4">
                  {{ $message }}
               </p>
               @enderror
           </div>

            <div class="flex items-center justify-center mt-4">
               
                <x-button class="ml-4">
                    {{-- {{ __('Register') }} --}}
                    Edit User
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection