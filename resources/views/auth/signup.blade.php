
@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<section class="max-w-md mx-auto py-12 px-4 sm:py-16 sm:px-8">
    <div class="signup-form bg-white p-6 sm:p-8 rounded-xl shadow-lg hover:transform hover:-translate-y-1 transition-transform duration-300">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 text-center">Create Your Account</h2>
        <form action="{{ route('signup.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#d8bfd8] focus:shadow-[0_0_0_2px_rgba(216,191,216,0.2)] font-semibold text-gray-800" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#d8bfd8] focus:shadow-[0_0_0_2px_rgba(216,191,216,0.2)] font-semibold text-gray-800" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#d8bfd8] focus:shadow-[0_0_0_2px_rgba(216,191,216,0.2)] font-semibold text-gray-800" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">
                @error('phone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#d8bfd8] focus:shadow-[0_0_0_2px_rgba(216,191,216,0.2)] font-semibold text-gray-800" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-[#d8bfd8] focus:shadow-[0_0_0_2px_rgba(216,191,216,0.2)] font-semibold text-gray-800" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">
            </div>
            <button type="submit" class="w-full p-3 bg-purple-800 text-white rounded-lg font-semibold hover:bg-purple-900 hover:-translate-y-1 hover:shadow-md transition-all duration-300" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Sign Up</button>
        </form>
        <p class="text-center mt-4 text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-violet-600 hover:underline">Sign In</a></p>
    </div>
</section>
@endsection