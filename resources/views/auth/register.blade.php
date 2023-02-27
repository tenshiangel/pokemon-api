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
                Create your account
            </h1>
            
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="border sm:text-sm rounded-lg block w-full p-2.5 @error('first_name') bg-red-50 border-red-700 text-red-900 placeholder-red-700 is-invalid @else bg-gray-50 border-gray-300 text-gray-900 @enderror" required autofocus>
                        @error('first_name')
                            <div class="invalid-feedback text-red-700 pt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="border sm:text-sm rounded-lg block w-full p-2.5 @error('last_names') bg-red-50 border-red-700 text-red-900 placeholder-red-700 is-invalid @else bg-gray-50 border-gray-300 text-gray-900 @enderror" required>
                        @error('last_name')
                            <div class="invalid-feedback text-red-700 pt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900">Birthdate</label>
                    <input type="text" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" placeholder="YYYY-MM-DD" class="border sm:text-sm rounded-lg block w-full p-2.5 @error('birthdate') bg-red-50 border-red-700 text-red-900 placeholder-red-700 is-invalid @else bg-gray-50 border-gray-300 text-gray-900 @enderror" required>
                    @error('birthdate')
                        <div class="invalid-feedback text-red-700 pt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="name@company.com" class="border sm:text-sm rounded-lg block w-full p-2.5 @error('email') bg-red-50 border-red-700 text-red-900 placeholder-red-700 is-invalid @else bg-gray-50 border-gray-300 text-gray-900 @enderror" required>
                    @error('email')
                        <div class="invalid-feedback text-red-700 pt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="••••••••" class="border sm:text-sm rounded-lg block w-full p-2.5 @error('password') bg-red-50 border-red-700 text-red-900 placeholder-red-700 is-invalid @else bg-gray-50 border-gray-300 text-gray-900 @enderror" required>
                    @error('password')
                        <div class="invalid-feedback text-red-700 pt-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-900">Confirm password</label>
                    <input type="password" id="password-confirm" name="password_confirmation" autocomplete="new-password" placeholder="••••••••" class="border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-50 border-gray-300 text-gray-900" required>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register new account</button>
            </form>
            <p class="mt-2 text-sm font-light text-gray-500">
                Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Sign In</a>
            </p>
        </div>
    </div>
</div>
@endsection