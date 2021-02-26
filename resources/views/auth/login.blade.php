{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('layouts/login')

@section('content')

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
<div class="login-container text-c animated flipInX">
    <div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    </div>
        <h3 class="text-whitesmoke">Digital Estudio</h3>
        <p class="text-whitesmoke">Iniciar Sesión</p>
    <div class="container-content">
        <form method="POST" action="{{ route('login') }}" class="margin-t">
            @csrf
            <div class="form-group">
                <input type="email" id="email" name="email" :value="old('email')" class="form-control" placeholder="Correo" required autofocus/>
                {{-- <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus /> --}}
            </div>
            <div class="form-group">
                <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password"/>
                {{-- <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" /> --}}
            </div>
            
            

            <button type="submit" class="form-button button-l margin-b">{{ __('Entrar') }}</button>

            
            @if (Route::has('password.request'))
                <a class="text-darkyellow" href="{{ route('password.request') }}">
                    <small>{{ __('Forgot your password?') }}</small>                
                </a>
            @endif

            <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
            <a class="text-darkyellow" href="{{ route('register')}}"><small>Registrarse</small></a>
        </form>
        <p class="margin-t text-whitesmoke"><small> DigitalEstudio &copy; 2021</small> </p>
    </div>
</div>
@endsection
