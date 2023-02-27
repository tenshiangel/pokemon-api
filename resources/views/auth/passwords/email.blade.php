@extends('layouts.guest')

@section('content')
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto z-5 md:h-screen lg:py-0">
    <a href="#" class="transition ease-in-out delay-150 flex items-center mb-6 text-3xl font-semibold text-gray-900 hover:text-white hover:scale-110">
        <img class="w-10 h-10 mr-4" src="https://www.freeiconspng.com/thumbs/pokeball-png/file-pokeball-png-0.png" alt="logo">
        PokeAPI    
    </a>
    <div class="w-full bg-white rounded-lg shadow border-gray-50 md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Reset password
            </h1>
            <form class="space-y-4" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="border sm:text-sm rounded-lg block w-full p-2.5 @error('email') bg-red-50 border-red-700 text-red-900 placeholder-red-700 is-invalid @else bg-gray-50 border-gray-300 text-gray-900 @enderror" placeholder="youremail@domain.com" required autocomplete="email" autofocus>
                    @error('email')
                    <div class="invalid-feedback text-red-700 pt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                @if (session('status'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-sm" role="alert">
                        <div>
                            <p class="text-sm">{{ session('status') }}</p>
                        </div>
                    </div>
                @else
                    <div class="bg-blue-100 border-t-4 border-blue-500 rounded-b text-teal-900 px-4 py-3 shadow-sm" role="alert">
                        <div>
                            <p class="text-sm">Enter your email address so we can send the reset password link to you.</p>
                        </div>
                    </div>
                @endif
                
                <button type="submit" class="w-full font-bold text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Send Reset Link</button>
                <p class="text-sm font-light text-gray-500">
                    If you remembered your password, you can <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection