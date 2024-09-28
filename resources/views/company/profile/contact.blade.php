<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>

    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Contact Us</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span> Contact
            </p>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="contact-section">
        <div class="contact-container">
            <!-- Form Card -->
            <div class="form-card card">
                <form action="{{ route('company.submit') }}" method="POST">
                @csrf    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="tel" id="telephone" name="telephone" required>
                    </div>
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea id="details" name="details" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="submit-button">Submit</button>
                </form>
            </div>

            <!-- Contact Info Card -->
            <div class="contact-info-card card">
                <h1 class="info-header">CONTACT US</h1>
                <h1 class="info-title">Let's Get In Touch</h1>
                <p class="info-description">Kindly contact us or provide your contact info and tell us what you’re looking for. We will get in touch with you and start from there.</p>
                <h3 class="info-title"><i class="fas fa-map-marker-alt"></i>ENETECH SDN BHD</h3>
                <p>NO. 32A (1ST FLOOR), JALAN KOTA RAJA J27/J, SECTION 27, 40400 SHAH ALAM, SELANGOR.</p>
                
                <h3><i class="fas fa-phone"></i>Calling Support</h3>
                <p>603 5102 9093 / 6019 310 8705</p>
                
                <h3><i class="fas fa-envelope"></i>Email Information</h3>
                <p><a href="mailto:info@enetech.my">info@enetech.my</a></p>

                <h3><i class="fas fa-headset"></i>Helpdesk Support</h3>
                <p>Create your own ticket now. <a href="{{ route('login') }}" class="support-link"><b>Click Here.</b></a></p>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container" id="map" style="height: 450px; width: 100%;"></div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([3.0149073746267394, 101.56275412303776], 20);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
        
            L.marker([ 3.014655616385378, 101.5628160564161], {
                icon: L.icon({
                    iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                    shadowSize: [41, 41]
                })
            }).addTo(map)
            .bindPopup('<a href="https://www.google.com/maps/dir/?api=1&destination=3.014655616385378,101.5628160564161" target="_blank">Get Directions</a>')
            .openPopup();
        });
    </script>
</x-app-layout>
