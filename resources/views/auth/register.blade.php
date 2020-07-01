@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}" class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
    @csrf

    <h1 class="text-2xl font-normal mb-10 text-center">Register</h1>

    <div class="mb-6">
        <label class="text-sm mb-2 block" for="name">Name</label>

        <div>
            <input id="name" type="text"
                class="border border-gray-400 rounded p-2 text-xs w-full{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" value="{{ old('name') }}" required autofocus>
        </div>
    </div>

    <div class="mb-6">
        <label class="text-sm mb-2 block" for="email">Email Address</label>

        <div>
            <input id="email" type="email"
                class="border border-gray-400 rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="mb-6">
        <label class="text-sm mb-2 block" for="password">Password</label>

        <div>
            <input id="password" type="password"
                class="border border-gray-400 rounded p-2 text-xs w-full{{ $errors->has('password') ? ' is-invalid' : '' }}"
                name="password" required>
        </div>
    </div>

    <div class="mb-6">
        <label class="text-sm mb-2 block" for="password-confirmation">Confirm Password</label>

        <div>
            <input id="password-confirmation" type="password" class="border border-gray-400 rounded p-2 text-xs w-full"
                name="password_confirmation" required>
        </div>
    </div>

    <div>
        <div>
            <button type="submit" class="button is-link mr-2">Register</button>
        </div>
    </div>
</form>
@endsection