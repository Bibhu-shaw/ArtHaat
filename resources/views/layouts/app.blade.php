<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ArtHaat - Discover handcrafted artworks including clay sculptures, wall paintings, cement works, and pandals.">
    <title>ArtHaat - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #e6e6fa, #d8bfd8);
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            font-weight: 600;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .navbar a {
            color: #374151;
            font-weight: 700;
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: #8a2be2;
        }
        .navbar a.active {
            color: #6a0dad;
            border-bottom: 2px solid #6a0dad;
        }
        .auth-links a {
            color: #374151;
            font-weight: 700;
            padding: 0.75rem 1.25rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .auth-links a:hover {
            background-color: #d8bfd8;
            color: white;
        }
        .category-card {
            background-color: #fff;
            border-radius: 0.375rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #d8bfd8;
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        .category-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 0.375rem;
            margin-bottom: 0.75rem;
        }
        .category-card h3 {
            color: #374151;
            font-weight: 700;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.15);
            margin-bottom: 0.5rem;
        }
        .category-card a {
            background: #6a0dad;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-family: 'Papyrus', 'Copperplate', 'Brush Script MT', fantasy;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }
        .category-card a:hover {
            background: #4b0082;
            transform: translateY(-2px);
        }
        .hamburger {
            display: none;
            color: #374151;
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
            .category-card img {
                height: 120px;
            }
        }
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
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
                <a href="{{ route('recent-clients') }}" class="hover:text-violet-600 {{ request()->routeIs('recent-clients') ? 'active' : '' }}">Recent Clients</a>
                <a href="{{ route('our-works') }}" class="hover:text-violet-600 {{ request()->routeIs('our-works') ? 'active' : '' }}">Our Works</a>
                <a href="{{ route('dashboard') }}#about" class="hover:text-violet-600">About Us</a>
                <a href="{{ route('dashboard') }}#contact" class="hover:text-violet-600">Contact Us</a>
            </div>
        </div>
        <div class="auth-links md:flex space-x-2 hidden">
            <a href="{{ route('signup') }}" class="border border-violet-300 hover:bg-violet-100 hover:text-violet-700 rounded-md text-sm md:text-base">Signup</a>
            <a href="{{ route('login') }}" class="bg-violet-600 text-white hover:bg-violet-700 rounded-md text-sm md:text-base">Login</a>
        </div>
    </nav>

    @yield('content')

    <script>
        // Hamburger Menu Toggle
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.innerHTML = navLinks.classList.contains('active') ? '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Handle URL hash on page load
        window.addEventListener('load', () => {
            const hash = window.location.hash.replace('#', '');
            if (hash) {
                console.log(`Page loaded with hash: ${hash}`);
                const section = document.getElementById(hash);
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth' });
                } else {
                    console.error(`Section with ID ${hash} not found`);
                }
            }
        });
    </script>
</body>
</html>