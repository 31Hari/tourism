@extends('user.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="#" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-500 text-lg">Your Logo</span>
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-3 ">
                    <a href="{{ route('user.login') }}" class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-blue-500 hover:text-white transition duration-300">Log In</a>
                    <a href="{{ route('user.register') }}" class="py-2 px-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-400 transition duration-300">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/2 xl:w-2/3">
                <div class="bg-white p-8 rounded-lg shadow-md mt-8">
                    <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Register') }}</h2>
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.register') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Username') }}</label>
                                <input id="username" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') border-red-500 @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                            </div>

                            <div>
                                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('first_name') border-red-500 @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">
                            </div>

                            <div>
                                <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_name') border-red-500 @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                            </div>
                        </div>

                        <div class="mb-4 mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">{{ __('Gender') }}</label>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <span class="ml-2">Male</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <span class="ml-2">Female</span>
                                </label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Phone Number') }}</label>
                                <input id="phone_number" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone_number') border-red-500 @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="tel">
                            </div>

                            <div>
                                <label for="aadhar_number" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Aadhar Number (Mandatory)') }}</label>
                                <input id="aadhar_number" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('aadhar_number') border-red-500 @enderror" name="aadhar_number" value="{{ old('aadhar_number') }}" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="driving_license" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Driving License (Optional)') }}</label>
                                <input id="driving_license" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('driving_license') border-red-500 @enderror" name="driving_license" value="{{ old('driving_license') }}">
                            </div>

                            <div>
                                <label for="voter_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Voter ID (Optional)') }}</label>
                                <input id="voter_id" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('voter_id') border-red-500 @enderror" name="voter_id" value="{{ old('voter_id') }}">
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
