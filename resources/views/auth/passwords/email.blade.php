@extends('layouts.app')

@section('content')
    <div class="bg-gray-300 mx-auto h-full flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg bg-blue-900 shadow-xl">

            <h1 class="text-red-500 text-4xl pt-8 font-bold font-mono">DWIKYS</h1>



            <h1 class="text-white text-3xl pt-8">Oh no!</h1>
            <h2 class="text-base text-blue-300">Enter your email to reset password</h2>

            <form method="POST" action="{{ route('password.email') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label for="email" class="text-blue-500 text-xs font-bold pl-3 pt-2 absolute uppercase">E-mail</label>

                    <input id="email" type="email" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('email') border border-red-600 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">

                    @error('email')
                    <span class="text-red-600 text-xs" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full rounded py-2 px-3 uppercase  bg-gray-400 text-blue-800 text-gray-100 font-bold">Send Reset Email</button>
                </div>

                <div class="pt-8 flex justify-between text-white text-sm font-bold">
                    <a class="hover:text-blue-200" href="{{ route('login') }}">Login</a>
                    <a class="hover:text-blue-200" href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
