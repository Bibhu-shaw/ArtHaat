@extends('layouts.app')

@section('title', 'Pastel Paintings')

@section('content')
<section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8">
    <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8 text-center" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Pastel Paintings</h2>
    <p class="text-lg sm:text-xl text-gray-600 text-center mb-10 sm:mb-12 max-w-3xl mx-auto">Immerse yourself in the soft, vibrant world of our pastel paintings, where delicate hues and intricate details bring stories to life.</p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/pastel1.png') }}')">
                <img src="{{ asset('images/pastel1.png') }}" alt="Emerald Embrace" class="w-full h-48 sm:h-56 object-cover">
            </div>
            <div class="p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Emerald Embrace</h3>
                <p class="text-sm sm:text-base text-gray-600">A stylized pastel artwork rendered in vibrant greens and blues, depicting a nurturing figure cradling a child. The swirling patterns in the background add a sense of cosmic connection and gentle movement to this tender scene.</p>
            </div>
        </div>
        <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/pastel2.png') }}')">
                <img src="{{ asset('images/pastel2.png') }}" alt="Enigmatic Vision" onerror="this.src='https://via.placeholder.com/300x200?text=Pastel+Painting'" class="w-full h-48 sm:h-56 object-cover">
            </div>
            <div class="p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">Enigmatic Vision</h3>
                <p class="text-sm sm:text-base text-gray-600">A vibrant and expressive pastel artwork, capturing a mesmerizing face adorned with intricate details and bold colors. The artist's use of the pastel medium creates a sense of mystery and allure.</p>
            </div>
        </div>
        <div class="painting-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
            <div class="relative cursor-pointer" onclick="openModal('{{ asset('images/pastel3.png') }}')">
                <img src="{{ asset('images/pastel3.png') }}" alt="The Spirit of Kathakali" onerror="this.src='https://via.placeholder.com/300x200?text=Pastel+Painting'" class="w-full h-48 sm:h-56 object-cover">
            </div>
            <div class="p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2" style="font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;">The Spirit of Kathakali</h3>
                <p class="text-sm sm:text-base text-gray-600">This pastel painting captures the vibrant spirit of Kathakali, showcasing bold green face makeup and colorful traditional attire. The striking contrast of bright hues against a dark background highlights the drama and cultural richness of the art form.</p>
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
