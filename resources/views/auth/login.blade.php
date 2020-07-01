@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
    @csrf

    <h1 class="text-2xl font-normal mb-10 text-center">Login</h1>

    <div class="mb-6">
        <label class="text-sm mb-2 block" for="email">Email Address</label>

        <div>
            <input id="email" type="email"
                class="border border-gray-400 rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="mb-6">
        <label class="label text-sm mb-2 block" for="password">Password</label>

        <div>
            <input id="password" type="password"
                class="border border-gray-400 rounded p-2 text-xs w-full{{ $errors->has('password') ? ' is-invalid' : '' }}"
                name="password" required>
        </div>
    </div>

    <div class="mb-6">
        <div>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="text-sm" for="remember">
                Remember Me
            </label>
        </div>
    </div>

    <div class="mb-6">
        <div>
            <button type="submit" class="button mr-2">
                Login
            </button>

            @if (Route::has('password.request'))
            <a class="text-default text-sm" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
            @endif
        </div>
    </div>
</form>
@endsection