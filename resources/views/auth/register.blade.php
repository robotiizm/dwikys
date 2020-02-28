@extends('layouts.app')

@section('content')
    <div class="bg-gray-300 mx-auto h-full flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg bg-blue-900 shadow-xl">

            <h1 class="text-red-500 text-4xl pt-8 font-bold font-mono">DWIKYS</h1>


            <h1 class="text-white text-3xl pt-8">Join Us</h1>
            <h2 class="text-base text-blue-300">Enter your information below</h2>

            <form method="POST" action="{{ route('register') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label for="name" class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase">Full Name</label>

                    <input id="name" type="text" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('name') border border-red-600 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">

                    @error('name')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label for="email" class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase">E-Mail</label>

                    <input id="email" type="email" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700  @error('email') border border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label for="password" class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase">Password</label>

                    <input id="password" type="password" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('password') border border-red-600 @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="relative pt-3">
                    <label for="password-confirm" class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase">Re-enter Password</label>

                    <input id="password-confirm" type="password" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 " name="password_confirmation" required placeholder="Confirm">
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full rounded py-2 px-3 uppercase bg-gray-400 text-blue-800 text-gray-100 font-bold">Register</button>
                </div>

                <div class="pt-8 flex justify-between text-white text-sm font-bold">
                    {{--                    <a class="hover:text-blue-200" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>--}}
                    <a href=""></a>
                    <a class="hover:text-blue-200" href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
