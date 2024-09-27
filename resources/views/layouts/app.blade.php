<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Enetech</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        /* Scroll to Top Button */
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: red;
            color: white;
            padding: 10px 15px;
            border-radius: 50%;
            text-align: center;
            display: none;
            z-index: 1000;
            cursor: pointer;
            font-size: 18px;
            transition: opacity 0.3s ease;
        }

        .scroll-to-top:hover {
            background-color: maroon;
        }

        .scroll-to-top i {
            font-size: 20px;
        }
    </style>

</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navigation -->
        <nav class="navbar">
            <div class="navbar-container">
                <!-- Logo -->
                <div class="navbar-logo">
                    <a href="{{ route('company.home') }}">
                        <img src="{{ asset('images/logo-profile.png') }}" class="logo" alt="Logo">
                    </a>
                </div>
                
                <!-- Hamburger Icon -->
                <div class="hamburger" onclick="toggleMenu()">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <!-- Navigation Links -->
                <div class="navbar-links" id="navbarLinks">
                    <a href="{{ route('company.home') }}" class="nav-link {{ request()->routeIs('company.home') ? 'active' : '' }}">HOME</a>
                    <div class="nav-item">
                        <a href="#" class="nav-link {{ request()->routeIs('company.about') ? 'active' : '' }}">ABOUT US<i class="fas fa-chevron-right arrow-icon"></i> </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('company.who_we_are') }}" class="dropdown-link {{ request()->routeIs('company.who_we_are') ? 'active' : '' }}">WHO WE ARE</a>
                            <a href="{{ route('company.values_ethics') }}" class="dropdown-link {{ request()->routeIs('company.values_ethics') ? 'active' : '' }}">VALUES & ETHICS</a>
                            <a href="{{ route('company.our_team') }}" class="dropdown-link {{ request()->routeIs('company.our_team') ? 'active' : '' }}">OUR TEAM</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a href="#" class="nav-link {{ request()->routeIs('company.product_services') ? 'active' : '' }}">PRODUCT & SERVICES<i class="fas fa-chevron-right arrow-icon"></i> </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('company.anything_as_services') }}" class="dropdown-link {{ request()->routeIs('company.anything_as_services') ? 'active' : '' }}">ANYTHING AS A SERVICES</a>
                            <a href="{{ route('company.web_design_development') }}" class="dropdown-link {{ request()->routeIs('company.web_design_development') ? 'active' : '' }}">WEB DESIGN & DEVELOPMENT</a>
                            <a href="{{ route('company.application_development') }}" class="dropdown-link {{ request()->routeIs('company.application_development') ? 'active' : '' }}">APPLICATION DEVELOPMENT</a>
                            <a href="{{ route('company.it_maintenance_support') }}" class="dropdown-link {{ request()->routeIs('company.it_maintenance_support') ? 'active' : '' }}">IT MAINTENANCE & SUPPORT</a>
                        </div>
                    </div>
                    <a href="{{ route('company.events') }}" class="nav-link {{ request()->routeIs('company.events') ? 'active' : '' }}">EVENTS</a>
                    <a href="{{ route('company.contact') }}" class="nav-link {{ request()->routeIs('company.contact') ? 'active' : '' }}">CONTACT US</a>
                </div>

                <!-- Login Button -->
                <div class="navbar-login">
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                </div>
            </div>
        </nav>

        <script>
            function toggleMenu() {
                const navbarLinks = document.getElementById('navbarLinks');
                const hamburger = document.querySelector('.hamburger');
                navbarLinks.classList.toggle('active');
                hamburger.classList.toggle('active');
            }

            document.addEventListener('DOMContentLoaded', function () {
                const currentPath = window.location.pathname;
                const navLinks = document.querySelectorAll('.nav-link');

                navLinks.forEach(link => {
                    if (link.getAttribute('href') === currentPath) {
                        link.classList.add('active');
                    }
                });
            });
        </script>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}

            <!-- Scroll to Top Button -->
            <a href="#" class="scroll-to-top" id="scrollToTopBtn">
                <i class="fas fa-arrow-up"></i>
            </a>

            <script>
                // Get the button
                let scrollToTopBtn = document.getElementById("scrollToTopBtn");

                // When the user scrolls down 100px from the top, show the button
                window.onscroll = function() {
                    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                        scrollToTopBtn.style.display = "block";
                    } else {
                        scrollToTopBtn.style.display = "none";
                    }
                };

                // When the user clicks on the button, scroll to the top of the document
                scrollToTopBtn.addEventListener("click", function(e) {
                    e.preventDefault(); // Prevent the default link behavior
                    window.scrollTo({ top: 0, behavior: 'smooth' }); // Smooth scroll to the top
                });
            </script>
        </main>
    </div>

    <!-- Footer -->
    <footer class="footer-container">
        <div class="footer-content">
            <table class="footer-table">
                <tbody>
                    <tr>
                        <!-- Footer Logo and Contact Info -->
                        <td class="footer-column">
                            <div class="footer-logo">
                                <img src="{{ asset('images/logo-footer.png') }}" alt="Logo" class="footer-logo-img">
                                <p class="footer-text"><i class="fas fa-map-marker-alt"></i> ENETECH SDN BHD NO. 32A (1ST FLOOR),JALAN KOTA<br>RAJA J27/J, SECTION 27, 40400 SHAH ALAM,<br>SELANGOR. </p>
                                <p class="footer-text"><i class="fas fa-envelope"></i> info@enetech.my</p>
                                <p class="footer-text"><i class="fas fa-phone"></i> 603-5102 9093 / 6019 310 8705</p>
                            </div>
                        </td>

                        <!-- Other Pages -->
                        <td class="footer-column">
                            <h3 class="footer-heading">Other Pages</h3>
                            <ul>
                                <li><a href="{{ route('company.home') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> Home</a></li>
                                <li><a href="{{ route('company.about') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> About Us</a></li>
                                <li><a href="{{ route('company.product_services') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> Services</a></li>
                                <li><a href="{{ route('company.events') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> Events</a></li>
                                <li><a href="{{ route('company.contact') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> Contact</a></li>
                            </ul>
                        </td>

                        <!-- Quick Links -->
                        <td class="footer-column">
                            <h3 class="footer-heading">Quick Links</h3>
                            <ul>
                                <li><a href="{{ route('company.privacyP') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> Privacy Policy</a></li>
                                <li><a href="{{ route('company.tos') }}" class="footer-link"><i class="fas fa-chevron-right arrow-icon"></i> Terms of Service</a></li>
                            </ul>
                        </td>

                        <!-- Newsletter and Social Media -->
                        <td class="footer-column">
                            <h3 class="footer-heading">Newsletter</h3>
                            <p class="footer-text">Get the latest news & updates</p>
                            
                            <div class="social-media">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="footer-bottom">
            <span class="footer-left">Enetech.my</span>
            <span class="footer-right">&copy; 2024 Your Company. All rights reserved.</span>
        </div>
    </footer>
</body>
</html>
