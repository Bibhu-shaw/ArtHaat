<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtHaat - Recent Clients</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom Styles for Lavender, Violet, and Purple Theme with Bolder Fantasy Font */
        body {
            background: linear-gradient(to bottom, #e6e6fa, #d8bfd8); /* Lavender to light purple gradient */
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy; /* Fantasy font */
            font-weight: 600; /* Bolder baseline */
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15); /* Subtle shadow for depth */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .navbar {
            background: white; /* Solid white background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* Subtle shadow */
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .navbar a {
            color: #374151; /* Dark gray text */
            font-weight: 700; /* Bolder for navigation */
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #8a2be2; /* Violet accent color */
        }

        .auth-links a {
            color: #374151;
            font-weight: 700; /* Bolder for prominence */
            padding: 0.75rem 1.25rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .auth-links a:hover {
            background-color: #d8bfd8; /* Light purple on hover */
            color: white;
        }

        .frame {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            border: 1px solid #d8bfd8; /* Light purple border */
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-container {
            position: relative;
            width: 100%;
            max-height: 300px;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            max-height: 300px;
            object-fit: contain;
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 1;
        }

        .image-container img[style*="display: none"] {
            opacity: 0;
        }

        .image-container .painting {
            display: none; /* Hide painting initially */
        }

        .slide-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #6a0dad; /* Purple button */
            color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 50%;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .slide-button.left {
            left: 1rem;
        }

        .slide-button.right {
            right: 1rem;
        }

        .slide-button:hover:not(:disabled) {
            background: #4b0082; /* Dark purple on hover */
            transform: translateY(-50%) translateY(-2px);
        }

        .slide-button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .zoom-controls {
            margin-top: 1rem;
            display: flex;
            gap: 1rem;
        }

        .zoom-controls button {
            background: #6a0dad; /* Purple button */
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            font-weight: 700;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
        }

        .zoom-controls button:hover {
            background: #4b0082; /* Dark purple on hover */
            transform: translateY(-2px);
        }

        .description {
            padding: 1.5rem;
        }

        .description h3 {
            color: #374151; /* Dark gray */
            font-weight: 700;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        .description p {
            color: #2d3748; /* Darker gray */
            font-weight: 600;
        }

        .global-description {
            padding: 2rem 1rem;
            text-align: center;
        }

        .global-description h2 {
            color: #374151;
            font-weight: 700;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
        }

        .global-description p {
            color: #2d3748;
            font-weight: 600;
            line-height: 1.75;
        }

        @media (max-width: 768px) {
            .global-description {
                padding: 1.5rem 0.5rem;
            }
        }

        .back-button {
            background: #6a0dad; /* Purple button */
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            font-weight: 700;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-button:hover {
            background: #4b0082; /* Dark purple on hover */
            transform: translateY(-2px);
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            color: #374151; /* Dark gray hamburger */
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 100%;
                left: 0;
                background: white;
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                z-index: 10;
            }

            .nav-links.active {
                display: flex;
            }

            .hamburger {
                display: block;
                cursor: pointer;
            }

            .auth-links {
                flex-direction: column;
                width: 100%;
                align-items: stretch;
            }

            .auth-links a {
                width: 100%;
                text-align: center;
                margin: 0.5rem 0;
            }

            .client-section {
                grid-template-columns: 1fr;
            }

            .frame, .description {
                width: 100%;
            }

            .slide-button {
                padding: 0.4rem;
            }

            .slide-button.left {
                left: 0.5rem;
            }

            .slide-button.right {
                right: 0.5rem;
            }
        }

        /* Smooth Scroll Behavior */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="antialiased">
    <nav class="navbar sticky top-0 z-50 py-4 px-4 sm:px-8 flex justify-between items-center">
        <div class="hamburger md:hidden text-xl">
            <i class="fas fa-bars"></i>
        </div>
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="text-lg md:text-xl font-semibold text-gray-800 hover:text-violet-600 mr-4">ArtHaat</a>
            <div class="nav-links md:flex space-x-4 md:space-x-8 hidden">
                <a href="{{ route('recent-clients') }}" class="hover:text-violet-600">Recent Clients</a>
                <a href="{{ route('our-works') }}" class="hover:text-violet-600">Our Works</a>
                <a href="{{ route('dashboard') }}#about" class="hover:text-violet-600">About Us</a>
                <a href="{{ route('dashboard') }}#contact" class="hover:text-violet-600">Contact Us</a>
            </div>
        </div>
        <div class="auth-links md:flex space-x-2 hidden">
            <a href="{{ route('signup') }}" class="border border-violet-300 hover:bg-violet-100 hover:text-violet-700 rounded-md text-sm md:text-base">Signup</a>
            <a href="{{ route('login') }}" class="bg-violet-600 text-white hover:bg-violet-700 rounded-md text-sm md:text-base">Login</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-8 sm:mb-12 text-center">Recent Clients</h2>
        
        <!-- Client 1: Original Photo and Final Painting -->
        <div class="client-section grid lg:grid-cols-2 gap-6 mb-12">
            <div class="frame">
                <div class="image-container">
                    <img src="{{ asset('images/client-photo1.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Client+Photo+1'" alt="Client Photo 1" class="original" data-scale="1">
                    <img src="{{ asset('images/painting-final1.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Final+Painting+1'" alt="Final Painting 1" class="painting" data-scale="1">
                    <button class="slide-button left" onclick="toggleSlide(this, 'left')" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button right" onclick="toggleSlide(this, 'right')"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="zoom-controls">
                    <button onclick="zoomImage('in', this.parentElement.previousElementSibling)">Zoom In</button>
                    <button onclick="zoomImage('out', this.parentElement.previousElementSibling)">Zoom Out</button>
                </div>
            </div>
            <div class="description">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Client 1: Father and Child, Punjab</h3>
                <p class="text-base sm:text-lg leading-relaxed">The painting depicts a man from Punjab with dark hair, a beard, and a mustache, wearing a maroon suit with a patterned tie, holding a young child. The realistic style captures intricate facial features and clothing details, delivered as a 20x30-inch canvas that resonated deeply with the client’s family.</p>
            </div>
        </div>

        <!-- Client 2: Original Photo and Final Painting -->
        <div class="client-section grid lg:grid-cols-2 gap-6 mb-12">
            <div class="frame">
                <div class="image-container">
                    <img src="{{ asset('images/client-photo2.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Client+Photo+2'" alt="Client Photo 2" class="original" data-scale="1">
                    <img src="{{ asset('images/painting-final2.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Final+Painting+2'" alt="Final Painting 2" class="painting" data-scale="1">
                    <button class="slide-button left" onclick="toggleSlide(this, 'left')" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button right" onclick="toggleSlide(this, 'right')"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="zoom-controls">
                    <button onclick="zoomImage('in', this.parentElement.previousElementSibling)">Zoom In</button>
                    <button onclick="zoomImage('out', this.parentElement.previousElementSibling)">Zoom Out</button>
                </div>
            </div>
            <div class="description">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Client 2: Abstract Expressionism, Dubai</h3>
                <p class="text-base sm:text-lg leading-relaxed">This client from Dubai sought a bold abstract painting for their modern office, requesting deep blues, violets, and gold accents to convey energy. ArtHaat’s artists created a 30x40-inch piece with layered brushstrokes and metallic accents, transforming the office ambiance with its vibrant, textured effect.</p>
            </div>
        </div>

        <!-- Client 3: Original Photo and Final Painting -->
        <div class="client-section grid lg:grid-cols-2 gap-6 mb-12">
            <div class="frame">
                <div class="image-container">
                    <img src="{{ asset('images/client-photo3.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Client+Photo+3'" alt="Client Photo 3" class="original" data-scale="1">
                    <img src="{{ asset('images/painting-final3.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Final+Painting+3'" alt="Final Painting 3" class="painting" data-scale="1">
                    <button class="slide-button left" onclick="toggleSlide(this, 'left')" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button right" onclick="toggleSlide(this, 'right')"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="zoom-controls">
                    <button onclick="zoomImage('in', this.parentElement.previousElementSibling)">Zoom In</button>
                    <button onclick="zoomImage('out', this.parentElement.previousElementSibling)">Zoom Out</button>
                </div>
            </div>
            <div class="description">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Client 3: Family Portrait, Mumbai</h3>
                <p class="text-base sm:text-lg leading-relaxed">A Mumbai client provided a family photo for a realistic portrait to mark a milestone anniversary, emphasizing warm tones and detailed expressions. ArtHaat’s team refined sketches to capture each member’s likeness, delivering an 18x24-inch oil painting with a custom frame that earned heartfelt appreciation.</p>
            </div>
        </div>

        <!-- Client 4: Original Photo and Final Painting -->
        <div class="client-section grid lg:grid-cols-2 gap-6 mb-12">
            <div class="frame">
                <div class="image-container">
                    <img src="{{ asset('images/client-photo4.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Client+Photo+4'" alt="Client Photo 4" class="original" data-scale="1">
                    <img src="{{ asset('images/painting-final4.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Final+Painting+4'" alt="Final Painting 4" class="painting" data-scale="1">
                    <button class="slide-button left" onclick="toggleSlide(this, 'left')" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button right" onclick="toggleSlide(this, 'right')"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="zoom-controls">
                    <button onclick="zoomImage('in', this.parentElement.previousElementSibling)">Zoom In</button>
                    <button onclick="zoomImage('out', this.parentElement.previousElementSibling)">Zoom Out</button>
                </div>
            </div>
            <div class="description">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Client 4: Cultural Heritage Artwork, Jaipur</h3>
                <p class="text-base sm:text-lg leading-relaxed">A Jaipur client requested a painting celebrating their cultural heritage with traditional motifs and earthy tones inspired by a historical artifact. ArtHaat’s artists researched cultural symbols, delivering a 36x48-inch canvas blending tradition and modernity, delighting the client with its authenticity.</p>
            </div>
        </div>

        <!-- Client 5: Original Photo and Final Painting -->
        <div class="client-section grid lg:grid-cols-2 gap-6 mb-12">
            <div class="frame">
                <div class="image-container">
                    <img src="{{ asset('images/client-photo5.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Client+Photo+5'" alt="Client Photo 5" class="original" data-scale="1">
                    <img src="{{ asset('images/painting-final5.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Final+Painting+5'" alt="Final Painting 5" class="painting" data-scale="1">
                    <button class="slide-button left" onclick="toggleSlide(this, 'left')" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button right" onclick="toggleSlide(this, 'right')"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="zoom-controls">
                    <button onclick="zoomImage('in', this.parentElement.previousElementSibling)">Zoom In</button>
                    <button onclick="zoomImage('out', this.parentElement.previousElementSibling)">Zoom Out</button>
                </div>
            </div>
            <div class="description">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Client 5: Urban Cityscape, New York</h3>
                <p class="text-base sm:text-lg leading-relaxed">A New York client commissioned a realistic cityscape painting based on a photograph of Manhattan at dusk, requesting vibrant lights and detailed architecture. ArtHaat’s artists crafted a 24x36-inch canvas, capturing the city’s energy with precise reflections and textures, earning praise for its lifelike quality.</p>
            </div>
        </div>

        <!-- Client 6: Original Photo and Final Painting -->
        <div class="client-section grid lg:grid-cols-2 gap-6 mb-12">
            <div class="frame">
                <div class="image-container">
                    <img src="{{ asset('images/client-photo6.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Client+Photo+6'" alt="Client Photo 6" class="original" data-scale="1">
                    <img src="{{ asset('images/painting-final6.jpeg') }}" onerror="this.src='https://via.placeholder.com/600x400?text=Final+Painting+6'" alt="Final Painting 6" class="painting" data-scale="1">
                    <button class="slide-button left" onclick="toggleSlide(this, 'left')" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button right" onclick="toggleSlide(this, 'right')"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="zoom-controls">
                    <button onclick="zoomImage('in', this.parentElement.previousElementSibling)">Zoom In</button>
                    <button onclick="zoomImage('out', this.parentElement.previousElementSibling)">Zoom Out</button>
                </div>
            </div>
            <div class="description">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Client 6: Pet Portrait, London</h3>
                <p class="text-base sm:text-lg leading-relaxed">A London client requested a realistic portrait of their beloved dog, emphasizing the pet’s expressive eyes and fur texture. ArtHaat’s artists worked from a provided photo, delivering a 16x20-inch oil painting that captured the dog’s personality, deeply moving the client with its detail.</p>
            </div>
        </div>

        <!-- Global Description Section -->
        <div class="global-description max-w-4xl mx-auto">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">Our Commitment to ArtHaat Excellence</h2>
            <p class="text-base sm:text-lg leading-relaxed">
                At ArtHaat, we specialize in creating realistic paintings that bring your visions to life with unparalleled detail and emotional depth. Our orders come from across India and from clients worldwide, including the USA, UK, Australia, and beyond, reflecting our global reach and trust in our craftsmanship. Whether it’s a cherished family portrait, a vibrant landscape, or a cultural masterpiece, our artists blend traditional techniques with modern innovation to deliver art that resonates. We pride ourselves on close collaboration with clients, ensuring every piece meets their unique expectations. With a seamless online platform and reliable international delivery, ArtHaat is dedicated to transforming your ideas into timeless artworks, no matter where you are.
            </p>
        </div>

        <!-- Back to Dashboard Button -->
        <div class="text-center mt-8">
            <a href="{{ route('dashboard') }}" class="back-button">Back to Dashboard</a>
        </div>
    </section>

    <script>
        // Smooth Scroll Function
        function scrollToSection(sectionId) {
            console.log(`Attempting to scroll to section: ${sectionId}`);
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            } else {
                console.error(`Section with ID ${sectionId} not found`);
            }
        }

        // Handle URL hash on page load
        window.addEventListener('load', () => {
            const hash = window.location.hash.replace('#', '');
            if (hash) {
                console.log(`Page loaded with hash: ${hash}`);
                scrollToSection(hash);
            }
        });

        // Zoom Functionality
        function zoomImage(direction, imageContainer) {
            const img = imageContainer.querySelector('img:not([style*="display: none"])');
            if (!img) {
                console.error('No visible image found for zooming');
                return;
            }
            let scale = parseFloat(img.getAttribute('data-scale')) || 1;

            if (direction === 'in' && scale < 2) {
                scale += 0.25;
            } else if (direction === 'out' && scale > 0.5) {
                scale -= 0.25;
            }

            img.style.transform = `scale(${scale})`;
            img.setAttribute('data-scale', scale);
            console.log(`Zoomed ${direction} to scale ${scale} for ${img.alt}`);
        }

        // Slide Functionality
        function toggleSlide(button, direction) {
            const imageContainer = button.parentElement;
            const originalImg = imageContainer.querySelector('.original');
            const paintingImg = imageContainer.querySelector('.painting');
            const leftButton = imageContainer.querySelector('.slide-button.left');
            const rightButton = imageContainer.querySelector('.slide-button.right');
            const isOriginalVisible = originalImg.style.display !== 'none';

            if (isOriginalVisible && direction === 'right') {
                originalImg.style.display = 'none';
                paintingImg.style.display = 'block';
                leftButton.disabled = false;
                rightButton.disabled = true;
                console.log(`Toggled to painting for ${paintingImg.alt}`);
            } else if (!isOriginalVisible && direction === 'left') {
                originalImg.style.display = 'block';
                paintingImg.style.display = 'none';
                leftButton.disabled = true;
                rightButton.disabled = false;
                console.log(`Toggled to original for ${originalImg.alt}`);
            }

            // Apply stored zoom scale
            originalImg.style.transform = `scale(${originalImg.getAttribute('data-scale') || 1})`;
            paintingImg.style.transform = `scale(${paintingImg.getAttribute('data-scale') || 1})`;
        }

        // Hamburger Menu Toggle
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.innerHTML = navLinks.classList.contains('active') ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
    </script>
</body>
</html>