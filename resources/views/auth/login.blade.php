@extends('layouts.app')

@section('content')
    <div class="mx-auto h-full flex justify-center items-center bg-gray-300">
        <div class="w-96 bg-blue-900 rounded-lg shadow-2xl p-6">
            <h1 class="text-red-500 text-4xl pt-8 font-bold font-mono">DWIKYS</h1>

            <h1 class="text-white text-3xl pt-8">Welcome Back!</h1>
            <h2 class="text-blue-300">Enter your credential down below</h2>

            <form method="POST" action="{{ route('login') }}" class="pt-8">
                @csrf

                <div class="relative">
                    <label for="email" class="uppercase text-blue-500 text-xs font-bold pl-3 pt-2 pb-2 absolute" >E-mail</label>
                    <div class="">
                        <input id="email" type="email" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('email') is-invalid @enderror "
                               name="email"  value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="your@email.com">
                        @error('email')
                        <span class="invalid-feedback text-red-600 text-sm" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>
                </div>

                <div class="relative pt-5">
                    <label for="password" class="uppercase text-blue-500 text-xs font-bold pl-3 pt-2 absolute">Password</label>

                    <div>
                        <input id="password" type="password" class="pt-8 w-full rounded pl-3 pb-2 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('password') is-invalid @enderror"
                               name="password"  autocomplete="current-password" placeholder="your password">


                        @error('password')
                        <span class="invalid-feedback text-red-600 text-sm" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                </div>

                <div class="pt-2">
                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="text-white" for="remember">Remember Me</label>
                </div>
                <div class="pt-2">
                    <button type="submit" class="uppercase rounded text-gray-700 font-bold bg-gray-300 w-full h-10 ">
                        Login
                    </button>
                </div>
                <div class="text-gray-100 flex justify-between pt-6 text-sm font-bold">
                    <a  href="{{ route('password.request') }}">Forgot Your Password?</a>
                    <a  href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
@endsection
