@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-white">
    <div class="w-96 rounded-lg shadow-xl p-6">

            <h1 class="text-3xl pt-8">Join Us</h1>
            <h2 class="text-base">Enter your information below</h2>

            <form method="POST" action="{{ route('register') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label for="name" class="text-xs font-bold pl-3 pt-2 absolute uppercase">Full Name</label>

                    <input id="name" type="text" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-gray-300 bg-gray-200 @error('name') border border-red-600 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">

                    @error('name')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label for="email" class="text-xs font-bold pl-3 pt-2 absolute uppercase">E-Mail</label>

                    <input id="email" type="email" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-gray-300 bg-gray-200 @error('email') border border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label for="password" class="text-xs font-bold pl-3 pt-2 absolute uppercase">Password</label>

                    <input id="password" type="password" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-gray-300 bg-gray-200 @error('password') border border-red-600 @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label for="password-confirm" class="text-xs font-bold pl-3 pt-2 absolute uppercase">Re-enter Password</label>

                    <input id="password-confirm" type="password" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-gray-300 bg-gray-200" name="password_confirmation" required placeholder="Confirm">
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full rounded py-2 px-3 uppercase text-left bg-gray-900 text-white font-bold">Register</button>
                </div>

                <div class="pt-8 flex justify-between text-sm font-bold">
                    <a class="hover:text-gray-800" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    <a class="hover:text-gray-800" href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
