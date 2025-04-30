@extends('layouts.app')

@section('title', 'Our Works')

@section('content')
<section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-8 sm:mb-12 text-center">Which Work Would You Like to Explore?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-6">
        <!-- Clay Works -->
        <div class="category-card">
            <img src="{{ asset('images/clay.png') }}" alt="Clay Works Preview" onerror="this.src='https://via.placeholder.com/300x150?text=Clay+Works'" class="w-full h-32 sm:h-40 object-cover rounded-lg mb-4">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Clay Works</h3>
            <a href="{{ route('clay-works') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-violet-700 inline-block">Explore</a>
        </div>
        <!-- Wall Paintings -->
        <div class="category-card">
            <img src="{{ asset('images/wall.jpeg') }}" alt="Wall Paintings Preview" onerror="this.src='https://via.placeholder.com/300x150?text=Wall+Paintings'" class="w-full h-32 sm:h-40 object-cover rounded-lg mb-4">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Wall Paintings</h3>
            <a href="{{ route('wall-paintings') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-violet-700 inline-block">Explore</a>
        </div>
        <!-- Cement Works -->
        <div class="category-card">
            <img src="{{ asset('images/cement-works.jpeg') }}" alt="Cement Works Preview" onerror="this.src='https://via.placeholder.com/300x150?text=Cement+Works'" class="w-full h-32 sm:h-40 object-cover rounded-lg mb-4">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Cement Works</h3>
            <a href="{{ route('cement-works') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-violet-700 inline-block">Explore</a>
        </div>
        <!-- Pandals -->
        <div class="category-card">
            <img src="{{ asset('images/pandals.jpeg') }}" alt="Pandals Preview" onerror="this.src='https://via.placeholder.com/300x150?text=Pandals'" class="w-full h-32 sm:h-40 object-cover rounded-lg mb-4">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Pandals</h3>
            <a href="{{ route('pandals') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-violet-700 inline-block">Explore</a>
        </div>
        <!-- Others -->
        <div class="category-card">
            <img src="{{ asset('images/others.jpeg') }}" alt="Others Preview" onerror="this.src='https://via.placeholder.com/300x150?text=Others'" class="w-full h-32 sm:h-40 object-cover rounded-lg mb-4">
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Others</h3>
            <a href="{{ route('others') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-violet-700 inline-block">Explore</a>
        </div>
    </div>
    <div class="text-center mt-8 sm:mt-12">
        <a href="{{ route('dashboard') }}" class="bg-purple-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-purple-900 hover:translate-y-[-2px] hover:shadow-md inline-block">Back to Dashboard</a>
    </div>
</section>
@endsection