<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/anything.css') }}">

    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Anything as Services</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span> Anything as Services
            </p>
        </div>
    </header>

    <!-- Cloud Solutions Section -->
    <section class="cloud-solutions-section">
        <div class="cloud-solutions-container">
            <h1 class="cloud-solutions-title">Your Gateway to Next Generation Cloud Solutions</h1>
            <p class="cloud-solutions-description">
                As Malaysia's leading network of cloud-connected and cloud-enabled data centres, ENETECH provides tailored solutions to help your business reach its full digital potential. With our expert team and comprehensive strategy, we prioritise your business goals while ensuring maximum security.
            </p>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="section-cards">
        <div class="container card-container">
            <div class="card">
            <img src="{{ asset('images/who/1.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Infrastructure as a Service (IaaS):</h3>
                    <p>Offers virtualized computing resources over the internet, including virtual machines, storage, and networking. Users have control over operating systems, applications, and some networking components.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/who/2.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>WiFi as a Service (WaaS):</h3>
                    <p>Offers managed WiFi services to organizations, businesses, or enterprises without the need for them to own and maintain the underlying network infrastructure.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/3.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Platform as a Service (PaaS):</h3>
                    <p>Provides a platform allowing customers to develop, run, and manage applications without dealing with the underlying infrastructure. It includes tools, middleware, and development frameworks.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/4.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Security as a Service (SECaaS):</h3>
                    <p>Offers cloud-based model with a wide range of security solutions to protect systems, networks, applications, and data from potential cyber threats and vulnerabilities.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/5.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Backup and Disaster Recovery as a Service (BaaS/DRaaS):</h3>
                    <p>Offers backup, data recovery, and continuity services. It includes backup solutions, replication, and recovery options in case of disasters.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/6.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Software as a Service (SaaS):</h3>
                    <p>Delivers software applications over the internet on a subscription basis. Users can access and use software applications without worrying about installation, maintenance, or updates.</p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
