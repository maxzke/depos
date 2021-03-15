{{--  --}}


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
