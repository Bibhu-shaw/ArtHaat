@extends('layouts.app')

@section('title', 'Clay Works')

@section('content')
<section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8 text-center"
        style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Clay Works</h2>
    <p class="text-lg sm:text-xl text-gray-600 text-center mb-10 sm:mb-12 max-w-3xl mx-auto">
        Explore our handcrafted clay sculptures, where tradition meets artistry in intricate, tactile forms.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @php
            $clayDivs = [
                [
                    'title' => 'Rustic & Refined',
                    'main_image' => 'clay1.png',
                    'detail_images' => ['clay1.png', 'clay2.jpeg'],
                    'description' => 'Earthy textures meet elegant forms in this captivating piece.',
                ],
                [
                    'title' => 'Modern Minimalism',
                    'main_image' => 'clay3.jpeg',
                    'detail_images' => ['clay3.jpeg', 'clay4.jpeg'],
                    'description' => 'Clean lines and simple shapes define this contemporary clay creation.',
                ],
                [
                    'title' => 'Cultural Heritage',
                    'main_image' => 'clay5.jpeg',
                    'detail_images' => ['clay5.jpeg', 'clay6.jpeg'],
                    'description' => 'Intricate details and traditional motifs celebrate rich cultural history.',
                ],
            ];
        @endphp

        @foreach ($clayDivs as $index => $div)
            <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <div class="relative cursor-pointer" onclick="openModal({{ $index }})">
                    <img src="{{ asset('images/' . $div['main_image']) }}" alt="{{ $div['title'] }}"
                        onerror="this.src='https://via.placeholder.com/300x200?text=Clay+Work'"
                        class="w-full h-48 sm:h-56 object-cover">
                </div>
                <div class="p-4 sm:p-6">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2"
                        style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">
                        {{ $div['title'] }}
                    </h3>
                    <p class="text-sm sm:text-base text-gray-600">{{ $div['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="modal-content relative bg-white p-6 rounded-xl shadow-lg flex items-center">
            <button id="prevButton" class="absolute left-4 text-gray-500 hover:text-gray-800 cursor-pointer text-2xl"
                onclick="changeImage(-1)">&larr;</button>
            <span class="close-button absolute top-2 right-2 text-gray-500 hover:text-gray-800 cursor-pointer"
                onclick="closeModal()">&times;</span>
            <div class="image-slider-container">
                <img id="modalImage" src="" alt="Enlarged Artwork"
                    style="max-height: 70vh; max-width: 70vw; object-fit: contain;">
            </div>
            <button id="nextButton" class="absolute right-4 text-gray-500 hover:text-gray-800 cursor-pointer text-2xl"
                onclick="changeImage(1)">&rarr;</button>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-center items-center mt-10 sm:mt-12 gap-4 sm:gap-6">
        <a href="{{ route('dashboard') }}"
            class="bg-purple-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-900 hover:-translate-y-1 hover:shadow-md transition-all duration-300 inline-block"
            style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Back to Dashboard</a>
        <a href="{{ route('our-works') }}"
            class="bg-purple-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-900 hover:-translate-y-1 hover:shadow-md transition-all duration-300 inline-block"
            style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Back to Our Works</a>
    </div>
</section>

<script>
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const clayDivs = [
        {
            title: 'Rustic & Refined',
            images: ["{{ asset('images/clay1.png') }}", "{{ asset('images/clay2.jpeg') }}"],
        },
        {
            title: 'Modern Minimalism',
            images: ["{{ asset('images/clay3.jpeg') }}", "{{ asset('images/clay4.jpeg') }}"],
        },
        {
            title: 'Cultural Heritage',
            images: ["{{ asset('images/clay5.jpeg') }}", "{{ asset('images/clay6.jpeg') }}"],
        },
    ];
    let currentDivIndex = 0;
    let currentImageIndex = 0;

    function openModal(divIndex) {
        currentDivIndex = divIndex;
        currentImageIndex = 0;
        modalImage.src = clayDivs[currentDivIndex].images[currentImageIndex];
        modal.style.display = "flex";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function changeImage(direction) {
        currentImageIndex = (currentImageIndex + direction + clayDivs[currentDivIndex].images.length) % clayDivs[currentDivIndex].images.length;
        modalImage.src = clayDivs[currentDivIndex].images[currentImageIndex];
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            closeModal();
        }
    };
</script>
<style>
    .image-slider-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
</style>
@endsection
