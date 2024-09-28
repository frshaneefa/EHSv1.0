<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/application.css') }}">

    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Application Development</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span>Application Development
            </p>
        </div>
    </header>

    <!-- Cloud Solutions Section -->
    <section class="cloud-solutions-section">
        <div class="cloud-solutions-container">
            <h1 class="cloud-solutions-title">Bridging Business and Tech Gap Through Custom Software Development Solutions</h1>
            <p class="cloud-solutions-description">
            We are an award-winning custom software development company in Malaysia which combines strategic thinking with technical excellence to achieve your business goals.
            <br><br>
            Being the most trusted international advanced custom software development company in Malaysia. We always keep track of new technologies to deliver advanced custom enterprise software development solutions. We employ industry best practices to deliver robust, secure & scalable custom software development services for various industries worldwide
            <br><br>
            We provide full-cycle development services to our esteemed customers. Here is what you get when you outsource software development to ENETECH:  
            </p>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="section-cards">
        <div class="container card-container">
            <div class="card">
            <img src="{{ asset('images/who/1.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Expert Software Consulting</h3>
                    <p>We serve you with end-to-end software consulting and development solutions through the help of our industry experts from different knowledge domains.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/who/2.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Software UI/UX Design</h3>
                    <p>Our custom software designing team gives your web or mobile apps an interactive design, user-friendly website interface, motion graphics, and visual aspect.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/3.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Custom Software Development</h3>
                    <p>We built customize solutions to your requirement and focus on the facility providing distinctive operational competency to the unique business needs.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/4.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Software QA and Testing</h3>
                    <p>From the initial stage of the project, we put our expert quality analysts in the loop so that you can make sure your software application runs across all browsers and screens.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/5.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Software Maintenance & Support</h3>
                    <p>If you want to migrate your existing Software to other platform or upgrade its present version, we are always ready to help you.</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
