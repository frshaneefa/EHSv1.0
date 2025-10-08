<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enetech</title>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- Link to your CSS file -->
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    </head>

    <body style="background-image: url('{{ asset('images/BG_3.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Page Container -->
        <div class="page-container">

            <!-- Logo Section -->
            <div class="logo-container">
                <img src="{{ asset('images/logo-profile.png') }}" alt="Company Logo" class="company-logo">
            </div>

            <!-- Cards Section -->
            <div class="cards-container">

                <!-- ENETECH ICT SERVICES Card -->
                <div class="card">
                    <h2>ENETECH <br>ICT <br>SERVICES</h2>
                    <a href="{{ route('company.home') }}" class="card-button">VISIT HERE</a>
                </div>

                <!-- ENETECH EDUCATION SERVICES Card -->
                <div class="card">
                    <h2>ENETECH <br>EDUCATION SERVICES</h2>
                    <a href="{{ route('company.edu') }}" class="card-button">VISIT HERE</a>
                </div>

                <!-- ENETECH EDUCATION SERVICES Card -->
                <div class="card">
                    <h2>ENETECH <br>HELPDESK SUPPORT</h2>
                    <a href="{{ route('login') }}" class="card-button">VISIT HERE</a>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all card elements
        const cards = document.querySelectorAll('.card');
        
        // Add the 'show' class to each card with a delay to create a staggered effect
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('show');
            }, index * 200); // Delay between each card's animation
        });
    });
</script>

