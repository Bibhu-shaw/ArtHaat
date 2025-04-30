@extends('layouts.app')

@section('title', 'Water Paintings')

@section('content')
<section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8 text-center" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Water Paintings</h2>
    <p class="text-lg sm:text-xl text-gray-600 text-center mb-10 sm:mb-12 max-w-3xl mx-auto">Dive into the fluid beauty of our water paintings, where vibrant colors and flowing strokes capture the essence of nature.</p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/water1.png') }}')">
                <img src="{{ asset('images/water1.png') }}" alt="Vivid Watercolor" onerror="this.src='https://via.placeholder.com/300x200?text=Water+Painting'" class="w-full h-48 sm:h-56 object-cover">
            </div>
            <div class="p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Seaside Serenity</h3>
                <p class="text-sm sm:text-base text-gray-600">A calm village by the sea, where boats rest and simple lives unfold under the open sky.
Soft pastel tones capture the peace of a coastal morning.</p>
            </div>
        </div>
        <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/water2.png') }}')">
                <img src="{{ asset('images/water2.png') }}" alt="Misty River" onerror="this.src='https://via.placeholder.com/300x200?text=Water+Painting'" class="w-full h-48 sm:h-56 object-cover">
            </div>
            <div class="p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Whispers of Autumn</h3>
                <p class="text-sm sm:text-base text-gray-600">A winding path leads to a cozy cottage, surrounded by golden fields and trees ablaze with autumn colors.
The painting captures the crisp beauty and peaceful charm of fall.</p>
            </div>
        </div>
        <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/water3.png') }}')">
                <img src="{{ asset('images/water3.png') }}" alt="Ocean Breeze" onerror="this.src='https://via.placeholder.com/300x200?text=Water+Painting'" class="w-full h-48 sm:h-56 object-cover">
            </div>
            <div class="p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Emerald Reflections</h3>
                <p class="text-sm sm:text-base text-gray-600">A coastal vista with vibrant watercolors, capturing the freshness of the sea.</p>
            </div>
        </div>
    </div>

    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="modal-content relative bg-white p-6 rounded-xl shadow-lg">
            <span class="close-button absolute top-2 right-2 text-gray-500 hover:text-gray-800 cursor-pointer" onclick="closeModal()">&times;</span>
            <img id="modalImage" src="" alt="Enlarged Artwork" style="max-height: 70vh; max-width: 70vw; object-fit: contain;">
        </div>
    </div>

    <div class="flex flex-col sm:flex-row justify-center items-center mt-10 sm:mt-12 gap-4 sm:gap-6">
        <a href="{{ route('dashboard') }}" class="bg-purple-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-900 hover:-translate-y-1 hover:shadow-md transition-all duration-300 inline-block" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Back to Dashboard</a>
        <a href="{{ route('our-works') }}" class="bg-purple-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-900 hover:-translate-y-1 hover:shadow-md transition-all duration-300 inline-block" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Back to Our Works</a>
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

    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
</script>
@endsection
