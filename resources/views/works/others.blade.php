@extends('layouts.app')

@section('title', 'Others')

@section('content')
<section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8 text-center"
        style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Others</h2>
    <p class="text-lg sm:text-xl text-gray-600 text-center mb-10 sm:mb-12 max-w-3xl mx-auto">
        Discover our diverse range of unique artworks, crafted with passion and innovation across various mediums.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
        @php
            $otherDivs = [
                [
                    'title' => 'Mixed Media 1',
                    'image' => 'other1.png',
                    'description' => 'A vibrant mixed media piece.',
                ],
                [
                    'title' => 'Sculptural Install 1',
                    'image' => 'other2.jpeg',
                    'description' => 'An innovative sculptural installation.',
                ],
                [
                    'title' => 'Textile Art 1',
                    'image' => 'other3.jpeg',
                    'description' => 'A unique textile creation.',
                ],
                [
                    'title' => 'Mixed Media 2',
                    'image' => 'other4.jpeg',
                    'description' => 'Another stunning mixed media artwork.',
                ],
                [
                    'title' => 'Sculptural Install 2',
                    'image' => 'other5.jpeg',
                    'description' => 'A captivating sculptural installation.',
                ],
                [
                    'title' => 'Textile Art 2',
                    'image' => 'other6.jpeg',
                    'description' => 'A beautiful textile art piece.',
                ],
                [
                    'title' => 'Mixed Media 3',
                    'image' => 'other7.jpeg',
                    'description' => 'Exciting Mixed media art.',
                ],
                [
                    'title' => 'Sculptural Install 3',
                    'image' => 'other8.png',
                    'description' => 'Unique Sculptural Installation.',
                ],
            ];
        @endphp

        @foreach ($otherDivs as $div)
            <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/' . $div['image']) }}')">
                    <img src="{{ asset('images/' . $div['image']) }}" alt="{{ $div['title'] }}"
                        onerror="this.src='https://via.placeholder.com/300x200?text=Other+Artwork'"
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
        <div class="modal-content relative bg-white p-6 rounded-xl shadow-lg">
            <span class="close-button absolute top-2 right-2 text-gray-500 hover:text-gray-800 cursor-pointer"
                onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Enlarged Artwork"
                style="max-height: 70vh; max-width: 70vw; object-fit: contain;">
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

    function openModal(imageSrc) {
        modalImage.src = imageSrc;
        modal.style.display = "flex";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            closeModal();
        }
    };
</script>
@endsection
