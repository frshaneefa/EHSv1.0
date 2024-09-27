<x-app-layout>
    <!-- Link to the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/who_we_are.css') }}">
    
    <!-- Header with Background Image -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Who We Are</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span class="separator">&gt;</span> <!-- Red '>' -->
                Who We Are
            </p>
        </div>
    </header>

    <section class="section-one">
        <div class="section-one-content">
            <h1 class="section-one-title">Enetech Sdn Bhd - Connecting the World Through Innovation</h1>
            <p>
                Welcome to Enetech Sdn Bhd, a trailblazer in Information and Communication Technology (ICT). We specialize in providing a comprehensive suite of services, ranging from cutting-edge ICT solutions to reliable maintenance support. At Enetech Sdn Bhd, we are committed to transforming businesses through technology.
            </p>
            <p>
                Founded with a vision to empower businesses with innovative ICT solutions, Enetech Sdn Bhd is dedicated to delivering excellence in technology services. Our commitment extends beyond providing solutions; we strive to be your trusted partner in navigating the digital landscape. Established with a vision to bridge technological gaps and empower businesses with state-of-the-art solutions, we are committed to being a reliable partner in the world of ICT.
            </p>
        </div>

        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <img src="{{ asset('images/whoarewe/mission.jpeg') }}" alt="Image 1" class="card-image">
                <h2 class="card-title">Mission</h2>
                <p class="card-text">Our mission is to help organizations simplify their operations through state-of-the-art IT hardware and services. We strive to provide innovative technology solutions, expert advice, and excellent customer care that meet the specific demands of each client.</p>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <img src="{{ asset('images/whoarewe/vision.jpeg') }}" alt="Image 2" class="card-image">
                <h2 class="card-title">Vision</h2>
                <p class="card-text">Our vision is to become a leading provider of IT products and services globally. We look forward to being recognized for our dedication to delivering quality services, fostering positive relationships with our clients through our highly skilled and expert team.</p>
            </div>
        </div>
    </section>

</x-app-layout>
