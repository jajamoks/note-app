@extends('layouts.app')

@section('content')
    <div class="mx-auto h-full flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg shadow-xl">

            <h1 class="text-3xl pt-8">Oh no!</h1>
            <h2 class="text-base">Enter your email to reset password</h2>

            <form method="POST" action="{{ route('password.email') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label for="email" class="text-xs font-bold pl-3 pt-2 absolute uppercase">E-mail</label>

                    <input id="email" type="email" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-gray-300 bg-gray-200 @error('email') border border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full rounded py-2 px-3 uppercase text-left bg-gray-900 text-white font-bold">Send Reset Email</button>
                </div>

                <div class="pt-8 flex justify-between text-sm font-bold">
                    <a class="hover:text-gray-800" href="{{ route('login') }}">Login</a>
                    <a class="hover:text-gray-800" href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
