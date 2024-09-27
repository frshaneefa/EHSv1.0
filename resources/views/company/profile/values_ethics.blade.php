<x-app-layout>
    <!-- Link to the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/value_and_ethics.css') }}">

    <!-- Header with Background Image -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Value & Ethics</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a>
                <span class="separator">&gt;</span> <!-- Red '>' -->
                Value & Ethics
            </p>
        </div>
    </header>

    <!-- Introduction Section -->
    <section class="section-introduction">
        <div class="container mx-auto">
            <h2 class="section-title">Our Core Values</h2>
            <p>
                Values and ethics are fundamental pillars that guide the culture, operations, and decision-making within ENETECH. Establishing clear values and ethical principles is crucial for fostering a positive work environment, building trust with stakeholders, and ensuring responsible and sustainable business practices.
            </p>
        </div>
    </section>

    <section class="section-cards">
    <div class="container mx-auto">
        <div class="card-grid">
            <!-- Card 1: Integrity -->
            <div class="card">
                <i class="fas fa-gavel card-icon"></i> <!-- Integrity icon -->
                <h3 class="card-title">Integrity</h3>
                <p class="card-text">
                    Upholding honesty, transparency, and moral principles in all dealings, whether it's with clients, employees, or partners. This includes being truthful about capabilities, delivering what is promised, and maintaining confidentiality when required.
                </p>
            </div>

            <!-- Card 2: Innovation -->
            <div class="card">
                <i class="fas fa-lightbulb card-icon"></i> <!-- Innovation icon -->
                <h3 class="card-title">Innovation</h3>
                <p class="card-text">
                    Encouraging creativity, continuous learning, and the pursuit of innovative solutions that drive technological advancements and meet evolving market demands.
                </p>
            </div>

            <!-- Card 3: Teamwork and Collaboration -->
            <div class="card">
                <i class="fas fa-users card-icon"></i> <!-- Teamwork icon -->
                <h3 class="card-title">Teamwork and Collaboration</h3>
                <p class="card-text">
                    Emphasizing teamwork, cooperation, and open communication among employees, departments, and partners to achieve common goals and foster a supportive work environment.
                </p>
            </div>

            <!-- Card 4: Customer-Centricity -->
            <div class="card">
                <i class="fas fa-user-tag card-icon"></i> <!-- Customer-Centricity icon -->
                <h3 class="card-title">Customer-Centricity</h3>
                <p class="card-text">
                    Prioritizing the needs of customers and aiming to exceed their expectations by providing innovative, reliable, and high-quality solutions while offering excellent service and support.
                </p>
            </div>

            <!-- Card 5: Accountability -->
            <div class="card">
                <i class="fas fa-check-circle card-icon"></i> <!-- Accountability icon -->
                <h3 class="card-title">Accountability</h3>
                <p class="card-text">
                    Taking responsibility for actions, decisions, and their outcomes. This involves admitting mistakes, learning from them, and striving for improvement.
                </p>
            </div>

            <!-- Card 6: Ethical Use of Technology -->
            <div class="card">
                <i class="fas fa-laptop-code card-icon"></i> <!-- Ethical Use of Technology icon -->
                <h3 class="card-title">Ethical Use of Technology</h3>
                <p class="card-text">
                    Using technology for positive purposes while being mindful of its societal impact, avoiding the development or use of technology that could cause harm or contribute to unethical behavior.
                </p>
            </div>
        </div>
    </div>
</section>


</x-app-layout>
