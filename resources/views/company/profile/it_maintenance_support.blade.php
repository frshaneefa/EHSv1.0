<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/itms.css') }}">

    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container">
            <h1 class="header-title">IT Maintenance & Support</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span>IT Maintenance & Support
            </p>
        </div>
    </header>

    <!-- Cloud Solutions Section -->
    <section class="cloud-solutions-section">
        <div class="cloud-solutions-container">
            <h1 class="cloud-solutions-title">We are Managed Services Provider (MSP)</h1>
            <p class="cloud-solutions-description">
            We design personalized and customized managed service plans for your business. Instead of outsourcing IT when a problem occurs, managed services allow consistent network monitoring, handle all updating and maintenance tasks.
            <br><br>
            It can allows you to focus on the core business rather than worrying about the company’s IT functionality.  
            </p>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="section-cards">
        <div class="container card-container">
            <div class="card">
                <div class="card-content">
                    <h3>Our Managed and Maintenance Services</h3>
                    <img src="{{ asset('images/who/1.jpeg') }}" alt="Card 1 Image" class="card-image">
                    <ul class="service-list">
                        <li><i class="fas fa-check-circle red-tick"></i> Hardware Managed and Maintenance</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Cloud Backup and Disaster Recovery <br>Managed Services</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Data Center Physical Maintenance and Support Managed Services</li>
                        <li><i class="fas fa-check-circle red-tick"></i> WAN Infra Maintenance</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Managed Cloud Infrastructure Services</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Periodic and Adhoc Maintenance</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Managed Network and Security</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Manpower Outsourcing</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Why ENETECH Managed Services?</h3>
                    <img src="{{ asset('images/who/2.jpeg') }}" alt="Card 1 Image" class="card-image">
                    <ul class="service-list">
                        <li><i class="fas fa-check-circle red-tick"></i> 24X7 Monitoring and Troubleshooting</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Certified Engineers</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Single Point of Contact</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Proactive Support from Team</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Consultation and Advisory</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Yearly Preventive Maintenance</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Comprehensive Coverage</li>
                        <li><i class="fas fa-check-circle red-tick"></i> Structured Record, Report, and Documentation</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <h3>Our MSP Partners :</h3>
                    <div class="logo-grid">
                        <img src="{{ asset('images/msp_logos/acer.png') }}" alt="Acer">
                        <img src="{{ asset('images/msp_logos/aruba.png') }}" alt="Aruba">
                        <img src="{{ asset('images/msp_logos/dellemc.png') }}" alt="Dell EMC">
                        <img src="{{ asset('images/msp_logos/fortinet.png') }}" alt="Fortinet">
                        <img src="{{ asset('images/msp_logos/hp.png') }}" alt="HP">
                        <img src="{{ asset('images/msp_logos/microsoft.png') }}" alt="Microsoft">
                        <img src="{{ asset('images/msp_logos/prtg.png') }}" alt="PRTG Network Monitor">
                        <img src="{{ asset('images/msp_logos/sophos.png') }}" alt="Sophos">
                        <img src="{{ asset('images/msp_logos/asus.png') }}" alt="Asus">
                        <img src="{{ asset('images/msp_logos/cisco.png') }}" alt="Cisco">
                        <img src="{{ asset('images/msp_logos/hpe.png') }}" alt="Hewlett Packard Enterprise">
                        <img src="{{ asset('images/msp_logos/dell.png') }}" alt="Dell">
                        <img src="{{ asset('images/msp_logos/purestorage.png') }}" alt="Purestorage">
                        <img src="{{ asset('images/msp_logos/veeam.png') }}" alt="Veeam">
                        <img src="{{ asset('images/msp_logos/arcserve.png') }}" alt="Arcserve">
                        <img src="{{ asset('images/msp_logos/sangfor.png') }}" alt="Sangfor">
                        <img src="{{ asset('images/msp_logos/commscope.png') }}" alt="CommScope">
                        <img src="{{ asset('images/msp_logos/alhua.png') }}" alt="Alhua Technology">
                        <img src="{{ asset('images/msp_logos/hikvision.png') }}" alt="Hikvision">
                        <img src="{{ asset('images/msp_logos/fs.png') }}" alt="FS">
                        <img src="{{ asset('images/msp_logos/lenovo.png') }}" alt="Lenovo">
                        <img src="{{ asset('images/msp_logos/legrand.png') }}" alt="Legrand">
                        <img src="{{ asset('images/msp_logos/nsfocus.png') }}" alt="NSFocus">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
