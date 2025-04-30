<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtHaat - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Updated Custom Styles for Lavender, Violet, and Purple Theme with Bolder Fantasy Font */
        body {
            background: linear-gradient(to bottom, #e6e6fa, #d8bfd8);
            /* Lavender to light purple gradient */
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            /* Fantasy font */
            font-weight: 600;
            /* Slightly bolder baseline */
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            /* Subtle shadow for depth */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .navbar {
            background: white;
            /* Solid white background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            /* Subtle shadow */
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .navbar a {
            color: #374151;
            /* Dark gray text */
            font-weight: 700;
            /* Bolder for navigation */
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #8a2be2;
            /* Violet accent color */
        }

        .auth-links a {
            color: #374151;
            font-weight: 700;
            /* Bolder for prominence */
            padding: 0.75rem 1.25rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .auth-links a:hover {
            background-color: #d8bfd8;
            /* Light purple on hover */
            color: white;
        }

        .slider {
            position: relative;
            width: 100%;
            max-width: 100%;
            height: 400px;
            /* Adjust as needed */
            overflow: hidden;
            margin-top: 1rem;
            /* Remove border and oval border-radius */
        }

        @media (min-width: 640px) {
            .slider {
                height: 500px;
            }
        }

        @media (min-width: 768px) {
            .slider {
                height: 600px;
            }
        }

        .slides {
            display: flex;
            width: 500%;
            /* 5 slides (3 original + 2 clones) */
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            flex: 0 0 20%;
            /* 100% / 5 slides */
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Or contain, depending on desired effect */
            display: block;
        }

        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 1rem;
        }

        .slider-controls button {
            background: rgba(0, 0, 0, 0.3);
            /* More subtle controls */
            color: white;
            border: none;
            padding: 0.5rem 0.75rem;
            /* Smaller controls */
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .slider-controls button:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        .slider-statement {
            text-align: center;
            margin-top: 2rem;
            /* More spacing */
            font-size: 1.25rem;
            /* Adjust size */
            font-weight: 600;
            /* Bolder for visibility */
            color: #2d3748;
            /* Darker gray for contrast */
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            /* Fantasy font */
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            /* Depth */
        }

        .categories .category {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .categories .category:hover {
            transform: translateY(-0.5rem);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .categories .category img {
            border-bottom: 1px solid #edf2f7;
        }

        .categories .category a {
            color: #2d3748;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            /* Depth */
        }

        .categories .category a:hover {
            color: #8a2be2;
            /* Violet accent */
        }

        .about,
        .contact {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }

        .about:hover,
        .contact:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transform: translateY(-0.25rem);
        }

        .coordinator-img {
            border: none;
            /* Remove the gradient border */
            background: none;
            /* Remove the background gradient */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border-radius: 50%;
            overflow: hidden;
        }

        .team-img {
            border: none;
            /* Remove the gradient border */
            background: #f7fafc;
            /* Light gray background */
            border-radius: 0.5rem;
            padding: 0;
            /* Adjust padding as needed */
            overflow: hidden;
        }

        .recent-works-slides {
            display: flex;
            width: 500%;
            /* 5 slides (3 original + 2 clones) */
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .recent-works-slide {
            flex: 0 0 20%;
            /* 100% / 5 slides */
            height: 100%;
        }

        .recent-works-slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 1rem;
        }

        .recent-works-slider-controls button {
            background: rgba(0, 0, 0, 0.3);
            color: white;
            border: none;
            padding: 0.5rem 0.75rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .recent-works-slider-controls button:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        .video-links .video-link {
            background: #e6e6fa;
            /* Lavender background */
            color: #6a0dad;
            /* Purple text */
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            /* Fantasy font */
            font-weight: 700;
            /* Bolder for prominence */
            border: 1px solid #d8bfd8;
            /* Light purple border */
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            /* Depth */
        }

        .video-links .video-link:hover {
            background-color: #8a2be2;
            /* Violet on hover */
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.15);
        }

        .video-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .video-modal.active {
            display: flex;
        }

        .video-modal video {
            max-width: 90%;
            /* Adjust as needed */
            max-height: 80vh;
            border-radius: 0.5rem;
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.2);
        }

        .video-modal .close-button {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.8);
            color: #6a0dad;
            /* Purple */
            border: none;
            padding: 0.5rem;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .video-modal .close-button:hover {
            background: #ffffff;
            color: #4b0082;
            /* Dark purple */
        }

        .social-links a {
            color: #718096;
            /* Medium gray */
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .social-links a:hover {
            color: #8a2be2;
            /* Violet accent */
            transform: translateY(-2px);
        }

        .query-form {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .query-form input,
        .query-form textarea {
            border: 1px solid #cbd5e0;
            /* Light gray border */
            border-radius: 0.375rem;
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            /* Fantasy font */
            font-weight: 600;
            /* Bolder for input text */
            color: #2d3748;
            /* Darker gray for input text */
        }

        .query-form input::placeholder,
        .query-form textarea::placeholder {
            color: #2d3748;
            /* Darker gray for placeholders */
            font-weight: 600;
            /* Match input text */
        }

        .query-form input:focus,
        .query-form textarea:focus {
            border-color: #d8bfd8;
            /* Light purple focus */
            box-shadow: 0 0 0 2px rgba(216, 191, 216, 0.2);
        }

        .query-form button {
            background: #6a0dad;
            /* Purple button */
            color: white;
            border-radius: 0.375rem;
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            /* Fantasy font */
            font-weight: 700;
            /* Bolder for emphasis */
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            /* Depth */
        }

        .query-form button:hover {
            background: #4b0082;
            /* Dark purple on hover */
            transform: translateY(-2px);
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.15);
        }

        /* Ensure headings have text-shadow for consistency */
        h2,
        h3 {
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            /* Depth */
        }

        /* Bolder paragraphs in coordinator details */
        .coordinator-details p {
            font-weight: 600;
            /* Bolder for readability */
            color: #2d3748;
            /* Darker gray */
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            color: #374151;
            /* Dark gray hamburger */
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
                /* Make buttons full width */
            }

            .auth-links a {
                width: 100%;
                text-align: center;
                margin: 0.5rem 0;
            }

            .slider-statement {
                font-size: 1rem;
            }

            .video-links {
                flex-direction: column;
                align-items: stretch;
                /* Make buttons full width */
            }

            .video-links .video-link {
                width: 100%;
                text-align: center;
                margin: 0.5rem 0;
            }
        }

        /* Smooth Scroll Behavior */
        html {
            scroll-behavior: smooth;
        }

        /* .object-contain {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover; /* important for images */
        /* display: block;    removes extra space around inline images */
        }

        */
    </style>
</head>
<!-- <body class="antialiased">
    <nav class="navbar sticky top-0 z-50 py-4 px-4 sm:px-8 flex justify-between items-center">
        <div class="hamburger md:hidden text-xl">
            <i class="fas fa-bars"></i>
        </div>
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="text-lg md:text-xl font-semibold text-gray-800 hover:text-violet-600 mr-4">ArtHaat</a>
            <div class="nav-links md:flex space-x-4 md:space-x-8 hidden">
                <a href="{{ route('recent-clients') }}" class="hover:text-violet-600">Recent Clients</a>
                <a href="{{ route('our-works') }}" class="hover:text-violet-600">Our Works</a>
                <a href="javascript:void(0)" onclick="scrollToSection('about')" class="hover:text-violet-600">About Us</a>
                <a href="javascript:void(0)" onclick="scrollToSection('contact')" class="hover:text-violet-600">Contact Us</a>
            </div>
        </div>
        <div class="auth-links md:flex space-x-2 hidden">
            <a href="{{ route('signup') }}" class="border border-violet-300 hover:bg-violet-100 hover:text-violet-700 rounded-md text-sm md:text-base">Signup</a>
            <a href="{{ route('login') }}" class="bg-violet-600 text-white hover:bg-violet-700 rounded-md text-sm md:text-base">Login</a>
        </div>
    </nav> -->

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
                <a href="javascript:void(0)" onclick="scrollToSection('about')" class="hover:text-violet-600">About Us</a>
                <a href="javascript:void(0)" onclick="scrollToSection('contact')" class="hover:text-violet-600">Contact Us</a>
            </div>
        </div>

        <!-- Check if the user is logged in -->
        <div class="auth-links md:flex space-x-2 hidden">
            @auth
            <!-- Show logout button if the user is authenticated -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="bg-violet-600 text-white hover:bg-violet-700 rounded-md text-sm md:text-base">Logout</button>
            </form>

            @endauth

            @guest
            <!-- Show login and signup buttons if the user is not authenticated -->
            <a href="{{ route('signup') }}" class="border border-violet-300 hover:bg-violet-100 hover:text-violet-700 rounded-md text-sm md:text-base">Signup</a>
            <a href="{{ route('login') }}" class="bg-violet-600 text-white hover:bg-violet-700 rounded-md text-sm md:text-base">Login</a>
            @endguest
        </div>
    </nav>
    <div class="slider w-full h-[400px] sm:h-[500px] md:h-[600px] mt-4 relative">
        <div class="slides flex h-full">
            <!-- Clone of last slide (painting3.jpg) -->
            <div class="slide">
                <img src="{{ asset('images/painting3.jpg') }}" onerror="console.error('Failed to load painting3.jpg'); this.src='https://via.placeholder.com/1920x600?text=Painting+3'" alt="Painting 3">
            </div>
            <!-- Original slides -->
            <div class="slide">
                <img src="{{ asset('images/painting1.jpg') }}" onerror="console.error('Failed to load painting1.jpg'); this.src='https://via.placeholder.com/1920x600?text=Painting+1'" alt="Painting 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/painting2.jpg') }}" onerror="console.error('Failed to load painting2.jpg'); this.src='https://via.placeholder.com/1920x600?text=Painting+2'" alt="Painting 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/painting3.jpg') }}" onerror="console.error('Failed to load painting3.jpg'); this.src='https://via.placeholder.com/1920x600?text=Painting+3'" alt="Painting 3">
            </div>
            <!-- Clone of first slide (painting1.jpg) -->
            <div class="slide">
                <img src="{{ asset('images/painting1.jpg') }}" onerror="console.error('Failed to load painting1.jpg'); this.src='https://via.placeholder.com/1920x600?text=Painting+1'" alt="Painting 1">
            </div>
        </div>
        <div class="slider-controls">
            <button onclick="prevSlide()"><i class="fas fa-chevron-left"></i></button>
            <button onclick="nextSlide()"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
    <div class="slider-statement">At ArtHaat, we believe art speaks where words fall short. Every handmade painting and clay creation tells a story beyond language, capturing emotions in their purest form. Through our work, we connect hearts, minds, and moments.</div>

    <section class="categories max-w-7xl mx-auto py-12 px-4 sm:py-16 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8">Explore by Category</h2>
        <div class="category-row grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <div class="category bg-white rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/pastel.jpg') }}" alt="Pastel" class="w-full h-32 sm:h-40 object-cover">
                <a href="{{ route('pastel') }}" class="block py-3 sm:py-4 text-lg sm:text-xl font-semibold text-gray-800 hover:text-violet-600">Pastel</a>
            </div>
            <div class="category bg-white rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/water.png') }}" alt="Water" class="w-full h-32 sm:h-40 object-cover">
                <a href="{{ route('water') }}" class="block py-3 sm:py-4 text-lg sm:text-xl font-semibold text-gray-800 hover:text-violet-600">Water</a>
            </div>
            <div class="category bg-white rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/clay.png') }}" alt="Clay Works" class="w-full h-32 sm:h-40 object-cover">
                <a href="{{ route('clay-works') }}" class="block py-3 sm:py-4 text-lg sm:text-xl font-semibold text-gray-800 hover:text-violet-600">Clay Works</a>
            </div>
            <div class="category bg-white rounded-xl overflow-hidden shadow-lg">
                <img src="{{ asset('images/wall.jpeg') }}" alt="Wall Paintings" class="w-full h-32 sm:h-40 object-cover">
                <a href="{{ route('wall-paintings') }}" class="block py-3 sm:py-4 text-lg sm:text-xl font-semibold text-gray-800 hover:text-violet-600">Wall Paintings</a>
            </div>
        </div>
    </section>

    <section id="about" class="about max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8 rounded-xl shadow-xl">
        <div class="about-content flex flex-col lg:flex-row items-center mb-8 sm:mb-12">

            <div class="w-52 h-52 rounded-full overflow-hidden flex-shrink-0 mx-auto mb-6 lg:mb-0">
                <img src="{{ asset('images/TeamCordinator.jpeg') }}" alt="Team Coordinator" class="w-full h-full object-cover">
            </div>

            <div class="coordinator-details text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4 mx-5">Our Team Coordinator</h2>
                <p class="text-gray-600 text-base sm:text-lg leading-relaxed mx-5">
                    Buddheswar Ahir is the driving force and coordinator of ArtHaat. With years of experience in the field of handmade art, he brings a deep understanding of creativity, craftsmanship, and tradition. His passion for painting and clay work, along with his commitment to artistic excellence, has been a true source of inspiration for all of us at ArtHaat. Through his vision and leadership, he continues to guide the team towards creating meaningful, soulful art.
                </p>
                <br>
                <p class="mx-5">
                    Working closely under his guidance, the ArtHaat team brings together a blend of creativity, skill, and dedication. Each member contributes their unique talents to craft paintings and clay creations that connect emotions with artistry. Together, we strive to celebrate the beauty of handmade art, keeping alive the spirit of creativity and tradition that defines ArtHaat.
                </p>
            </div>

        </div>

        <div class="team-img w-full h-80 sm:h-96 lg:h-112 rounded-xl overflow-hidden relative">
            <div class="recent-works-slides flex h-full">
                <!-- Clone of last slide (recent-work3.jpeg) -->
                <div class="recent-works-slide flex-0 w-full h-full">
                    <img src="{{ asset('images/recent-work3.jpeg') }}" onerror="this.src='https://via.placeholder.com/1920x400?text=Recent+Work+3'" alt="Recent Work 3" class="w-full h-full object-cover">
                </div>
                <!-- Original slides -->
                <div class="recent-works-slide flex-0 w-full h-full">
                    <img src="{{ asset('images/recent-work1.jpeg') }}" onerror="this.src='https://via.placeholder.com/1920x400?text=Recent+Work+1'" alt="Recent Work 1" class="w-full h-full object-cover">
                </div>
                <div class="recent-works-slide flex-0 w-full h-full">
                    <img src="{{ asset('images/recent-work2.jpeg') }}" onerror="this.src='https://via.placeholder.com/1920x400?text=Recent+Work+2'" alt="Recent Work 2" class="w-full h-full object-cover">
                </div>
                <div class="recent-works-slide flex-0 w-full h-full">
                    <img src="{{ asset('images/recent-work3.jpeg') }}" onerror="this.src='https://via.placeholder.com/1920x400?text=Recent+Work+3'" alt="Recent Work 3" class="w-full h-full object-cover">
                </div>
                <!-- Clone of first slide (recent-work1.jpeg) -->
                <div class="recent-works-slide flex-0 w-full h-full">
                    <img src="{{ asset('images/recent-work1.jpeg') }}" onerror="this.src='https://via.placeholder.com/1920x400?text=Recent+Work+1'" alt="Recent Work 1" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="recent-works-slider-controls absolute top-1/2 w-full flex justify-between transform translate-y-[-50%] px-4">
                <button onclick="prevRecentWorkSlide()"><i class="fas fa-chevron-left"></i></button>
                <button onclick="nextRecentWorkSlide()"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
        <div class="video-links-section max-w-7xl mx-auto mt-8 sm:mt-12 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6">Some Videos of Our Work</h2>
            <div class="video-links flex flex-wrap justify-center gap-4 sm:gap-6">
                <button class="video-link" onclick="openVideo('{{ asset('videos/video1.mp4') }}', '{{ asset('images/video-poster1.jpeg') }}')">Video 1</button>
                <button class="video-link" onclick="openVideo('{{ asset('videos/video2.mp4') }}', '{{ asset('images/video-poster2.jpeg') }}')">Video 2</button>
                <button class="video-link" onclick="openVideo('{{ asset('videos/video3.mp4') }}', '{{ asset('images/video-poster3.jpeg') }}')">Video 3</button>
                <button class="video-link" onclick="openVideo('{{ asset('videos/video4.mp4') }}', '{{ asset('images/video-poster4.jpeg') }}')">Video 4</button>
            </div>
        </div>
    </section>

    <div class="video-modal" id="videoModal">
        <button class="close-button" onclick="closeVideo()"><i class="fas fa-times"></i></button>
        <video id="modalVideo" controls autoplay playsinline>
            <source id="modalVideoSource" src="" type="video/mp4">
        </video>
    </div>

    <section id="contact" class="contact max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-8 rounded-xl shadow-xl text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-6 sm:mb-8">Contact Us</h2>
        <div class="social-links flex justify-center space-x-6 sm:space-x-8 mb-8 sm:mb-12">
            <a href="tel:7070932159" class="text-blue-500 text-2xl sm:text-3xl hover:text-violet-600"><i class="fas fa-phone"></i></a>
            <a href="https://www.instagram.com/artisticfour?igsh=MTM4YWNuc2xxMnpxbA==" class="text-blue-500 text-2xl sm:text-3xl hover:text-violet-600"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/7070932159" class="text-blue-500 text-2xl sm:text-3xl hover:text-violet-600"><i class="fab fa-whatsapp"></i></a>
            <a href="https://youtube.com/@arthaat7105?si=-sx9FVXaObfb10-i" class="text-blue-500 text-2xl sm:text-3xl hover:text-violet-600"><i class="fab fa-youtube"></i></a>
            <a href="https://www.facebook.com/share/12FHfbenFon/" class="text-blue-500 text-2xl sm:text-3xl hover:text-violet-600"><i class="fab fa-facebook"></i></a>
        </div>
        <div class="query-form max-w-lg mx-auto bg-white p-6 sm:p-8 rounded-xl shadow-lg">
            <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4 sm:mb-6">Have a Query?</h3>
            <form action="{{ route('query.submit') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Your Name" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none">
                <input type="tel" name="phone" placeholder="Your Phone Number" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none">
                <textarea name="query" placeholder="Your Query" required class="w-full p-3 mb-4 border border-gray-300 rounded-lg focus:outline-none resize-y"></textarea>
                <button type="submit" class="w-full p-3 bg-violet-600 text-white rounded-lg font-semibold hover:bg-violet-700">Submit Query</button>
            </form>
        </div>
    </section>

    <script>
        // Smooth Scroll Function
        function scrollToSection(sectionId) {
            console.log(`Attempting to scroll to section: ${sectionId}`);
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                console.error(`Section with ID ${sectionId} not found`);
            }
        }

        // Main Slider Functionality (Automatic)
        const slides = document.querySelector('.slides');
        const totalOriginalSlides = 3; // Number of original slides
        const totalSlides = 5; // Total slides including clones (3 original + 2 clones)
        let currentSlide = 1; // Start at the first original slide (index 1 due to clone)
        let autoSlideInterval;

        function updateSlide() {
            console.log(`Showing slide ${currentSlide} (Painting ${getPaintingNumber(currentSlide)})`);
            slides.style.transition = 'transform 0.5s ease-in-out';
            slides.style.transform = `translateX(-${currentSlide * 20}%)`; // 100% / 5 slides = 20%
        }

        function getPaintingNumber(slideIndex) {
            // Map slide index to painting number (1, 2, or 3)
            if (slideIndex === 0) return 3; // Clone of painting3.jpg
            if (slideIndex === 4) return 1; // Clone of painting1.jpg
            return slideIndex; // Original slides (1, 2, 3)
        }

        function nextSlide() {
            currentSlide++;
            updateSlide();
            if (currentSlide >= totalSlides - 1) {
                setTimeout(() => {
                    slides.style.transition = 'none';
                    currentSlide = 1;
                    slides.style.transform = `translateX(-${currentSlide * 20}%)`;
                    setTimeout(() => {
                        slides.style.transition = 'transform 0.5s ease-in-out';
                    }, 50);
                }, 500); // Match transition duration
            }
        }

        function prevSlide() {
            currentSlide--;
            updateSlide();
            if (currentSlide <= 0) {
                setTimeout(() => {
                    slides.style.transition = 'none';
                    currentSlide = totalOriginalSlides;
                    slides.style.transform = `translateX(-${currentSlide * 20}%)`;
                    setTimeout(() => {
                        slides.style.transition = 'transform 0.5s ease-in-out';
                    }, 50);
                }, 500); // Match transition duration
            }
        }

        // Auto-slide every 3 seconds
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 3000);
        }

        // Stop auto-slide on manual interaction
        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        // Attach manual controls
        document.querySelector('.slider-controls .fa-chevron-left').parentElement.addEventListener('click', () => {
            prevSlide();
            resetAutoSlide();
        });
        document.querySelector('.slider-controls .fa-chevron-right').parentElement.addEventListener('click', () => {
            nextSlide();
            resetAutoSlide();
        });

        // Initialize the first slide and start auto-slide
        updateSlide();
        startAutoSlide();

        // Recent Works Slider Functionality (Manual)
        const recentWorksSlides = document.querySelector('.recent-works-slides');
        const totalRecentWorksOriginalSlides = 3; // Number of original slides
        const totalRecentWorksSlides = 5; // Total slides including clones
        let currentRecentWorksSlide = 1; // Start at first original slide

        function updateRecentWorksSlide() {
            console.log(`Showing recent work slide ${currentRecentWorksSlide}`);
            recentWorksSlides.style.transition = 'transform 0.5s ease-in-out';
            recentWorksSlides.style.transform = `translateX(-${currentRecentWorksSlide * 20}%)`; // 100% / 5 slides = 20%
        }

        function nextRecentWorkSlide() {
            currentRecentWorksSlide++;
            updateRecentWorksSlide();
            if (currentRecentWorksSlide >= totalRecentWorksSlides - 1) {
                setTimeout(() => {
                    recentWorksSlides.style.transition = 'none';
                    currentRecentWorksSlide = 1;
                    recentWorksSlides.style.transform = `translateX(-${currentRecentWorksSlide * 20}%)`;
                    setTimeout(() => {
                        recentWorksSlides.style.transition = 'transform 0.5s ease-in-out';
                    }, 50);
                }, 500); // Match transition duration
            }
        }

        function prevRecentWorkSlide() {
            currentRecentWorksSlide--;
            updateRecentWorksSlide();
            if (currentRecentWorksSlide <= 0) {
                setTimeout(() => {
                    recentWorksSlides.style.transition = 'none';
                    currentRecentWorksSlide = totalRecentWorksOriginalSlides;
                    recentWorksSlides.style.transform = `translateX(-${currentRecentWorksSlide * 20}%)`;
                    setTimeout(() => {
                        recentWorksSlides.style.transition = 'transform 0.5s ease-in-out';
                    }, 50);
                }, 500); // Match transition duration
            }
        }

        // Initialize the first recent work slide
        updateRecentWorksSlide();

        // Video Modal Functionality
        const videoModal = document.getElementById('videoModal');
        const modalVideo = document.getElementById('modalVideo');
        const modalVideoSource = document.getElementById('modalVideoSource');

        function openVideo(videoSrc, posterSrc) {
            console.log(`Opening video: ${videoSrc}`);
            modalVideoSource.setAttribute('src', videoSrc);
            modalVideo.setAttribute('poster', posterSrc);
            modalVideo.load(); // Reload video with new source
            videoModal.classList.add('active');
            modalVideo.play();

            // Close modal when video ends
            modalVideo.addEventListener('ended', closeVideo, {
                once: true
            });
        }

        function closeVideo() {
            console.log('Closing video modal');
            modalVideo.pause();
            modalVideoSource.setAttribute('src', ''); // Clear source
            modalVideo.load(); // Reset video
            videoModal.classList.remove('active');
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