@extends('template')
@section('content')
<div class="container py-5">
    <h1 class="text-center">Регистрация</h1>
    <div class="col-md-6 mx-auto">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name">Имя:</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Имя">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="pass">Пароль:</label>
                <input id="pass" name="password" type="password" class="form-control" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <label for="pass">Подтверждение пароля:</label>
                <input id="pass" name="password_confirmation" type="password" class="form-control" placeholder="Пароль">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" value="Зарегистрироваться">
            </div>
        </form>
    </div>
</div>
@endsection




{{--
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>--}}
