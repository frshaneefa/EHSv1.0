<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/edu.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js" defer></script>

    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Education Services</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span> Education Services
            </p>
        </div>
    </header>

    <!-- Cloud Solutions Section -->
    <section class="cloud-solutions-section">
        <div class="cloud-solutions-container">
            <p class="cloud-solutions-description">
            Welcome to <b class="bold">Enetech Sdn Bhd</b>, a premier Professional Education Consultancy and Agency dedicated to guiding students towards a brighter future through quality education. With a passion for excellence and a commitment to fostering academic success, we are your trusted partner in educational advancement. We specialize in comprehensive student recruitment services and offer tailored accommodation solutions, ensuring a holistic and seamless experience for aspiring students.
            <br><br>
            Malaysia's quality education and safe environment are key factors that attract overseas students to make Malaysia their first choice for overseas study.
            <br><br>
            We believe that this market trend will continue for a substantial period of time and this will promise a stable setting for students to concentrate on their studies.
            <br><br>
            Due to such market demand, ENETECH sincerely invites  students from various countries to enroll with Malaysia Local university’s education programme and responsible for promoting Malaysia's learning opportunities and overseas recruitment.
            </p>
        </div>
    </section>

    <section class="services">
        <div class="container mx-auto">
            <div class="card">
                <i class="fas fa-lightbulb fa-3x"></i>
                <h2><b>Expert Guidance</b></h2>
                <p>Outsource Your Critical IT Requirements with us and move ahead from your competitors.</p>
            </div>
            <div class="card">
                <i class="fas fa-globe  fa-3x"></i>
                <h2><b>Global Network</b></h2>
                <p>With a vast network of educational institutions worldwide, we connect students to opportunities that match their academic and career aspirations.</p>
            </div>
            <div class="card">
                <i class="fas fa-users fa-3x"></i>
                <h2><b>Client-Centric Approach</b></h2>
                <p>We prioritize the unique needs of each student, offering tailor-made solutions that foster success.</p>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container mx-auto">
            <div class="card">
                <i class="fas fa-balance-scale fa-3x"></i>
                <h2><b>Integrity and Transparency</b></h2>
                <p>We operate with the highest ethical standards, ensuring transparency in all our dealings.</p>
            </div>
            <div class="card">
                <i class="fas fa-user-graduate  fa-3x"></i>
                <h2><b>Student-Centric Approach</b></h2>
                <p>Our focus is on the unique needs of each student. We tailor our services to ensure a personalized and enriching experience for every client.</p>
            </div>
            <div class="card">
                <i class="fas fa-tools fa-3x"></i>
                <h2><b>Comprehensive Services</b></h2>
                <p>We offer end-to-end services, from academic guidance to accommodation solutions, providing a one-stop solution for all your educational needs.</p>
            </div>
        </div>
    </section>

    <!-- OUR SERVICES Section -->
    <section class="our-solutions-section">
        <div class="our-solutions-container">
            <h1 class="our-solutions-title">OUR SERVICES</h1>
            <p class="our-solutions-description">
            At <b class="bold">Enetech Sdn Bhd</b>, we understand that education is a transformative journey, and choosing the right path is crucial. Our team of experienced professionals is here to simplify this process for you. Established with the vision to empower students with the knowledge and skills needed to thrive in a competitive world, we offer comprehensive educational consultancy and recruitment services.
            </p>
        </div>
    </section>

    <section class="single-column-cards">
        <div class="container mx-auto">
            <div class="card">
                <img src="{{ asset('images/edu/1.jpeg') }}" alt="Service 1">
                <div class="card-content">
                    <h3><b>Student Placement:</b></h3>
                    <p>We specialize in placing students in renowned educational institutions worldwide. Whether you’re aiming for top-tier universities, colleges, or vocational training centers, we provide personalized guidance to match your aspirations.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/2.jpeg') }}" alt="Service 2">
                <div class="card-content">
                    <h3><b>Career Counselling:</b></h3>
                    <p>Our expert counsellors offer tailored advice based on individual strengths, interests, and career goals. We believe in creating a roadmap that aligns with your passions, ensuring a fulfilling educational and professional journey.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/3.jpeg') }}" alt="Service 3">
                <div class="card-content">
                    <h3><b>Visa Assistance:</b></h3>
                    <p>Navigating the visa process can be complex. Our dedicated team is well-versed in immigration regulations and helps in securing student visas, making your transition to a new academic environment smooth and stress-free.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/4.jpeg') }}" alt="Service 4">
                <div class="card-content">
                    <h3><b>Test Preparation:</b></h3>
                    <p>Success often starts with standardized tests. We offer comprehensive test preparation courses, equipping students with the skills and confidence needed to excel in exams such as the SAT, ACT, GRE, GMAT, and more.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/5.jpeg') }}" alt="Service 5">
                <div class="card-content">
                    <h3><b>Scholarship Guidance:</b></h3>
                    <p>We understand the financial aspect of education. Our team assists students in identifying and applying for scholarships, ensuring that deserving candidates have access to the financial support they need.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/6.jpeg') }}" alt="Service 6">
                <div class="card-content">
                    <h3><b>Accommodation Solutions:</b></h3>
                    <p>Beyond education, we understand the importance of a comfortable living environment. Our accommodation services include helping students secure suitable housing options, whether on-campus, off-campus, or homestays, ensuring a secure and conducive living space.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/7.jpeg') }}" alt="Service 7">
                <div class="card-content">
                    <h3><b>Language Proficiency Support:</b></h3>
                    <p>Language should never be a barrier to education. We offer language proficiency support, including preparatory courses and assistance with language exams, ensuring that students are well-prepared for their academic journey.</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/edu/8.jpeg') }}" alt="Service 8">
                <div class="card-content">
                    <h3><b>Cultural Orientation:</b></h3>
                    <p>Adapting to a new culture is a crucial aspect of studying abroad. Our cultural orientation programs provide valuable insights and practical tips, helping students seamlessly integrate into their new communities.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="image-logo-section">
        <div class="container mx-auto">
            <img src="{{ asset('images/edu/1.jpeg') }}" alt="Main Image" class="main-image">
            <div class="logo-container">
                <h2><b>We collaborate with Leading Education Institutions</b></h2>
                <div class="logo-row">
                    <div class="logo-item"><img src="{{ asset('images/edu/unimas.png') }}" alt="Logo 1" class="logo-image"></div>
                    <div class="logo-item"><img src="{{ asset('images/edu/utm.png') }}" alt="Logo 2" class="logo-image"></div>
                    <div class="logo-item"><img src="{{ asset('images/edu/um.png') }}" alt="Logo 3" class="logo-image"></div>
                    <div class="logo-item"><img src="{{ asset('images/edu/ukm.png') }}" alt="Logo 4" class="logo-image"></div>
                </div>
                <div class="logo-row">
                    <div class="logo-item"><img src="{{ asset('images/edu/uum.png') }}" alt="Logo 5" class="logo-image"></div>
                    <div class="logo-item"><img src="{{ asset('images/edu/unisza.png') }}" alt="Logo 6" class="logo-image"></div>
                    <div class="logo-item"><img src="{{ asset('images/edu/uthm.png') }}" alt="Logo 7" class="logo-image"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education cloud platformSection -->
    <section class="our-solutions-section">
        <div class="our-solutions-container">
            <h1 class="our-solutions-title">Education cloud platform</h1>
            <p class="our-solutions-description">
                As the internet age featuring big data, intelligence, mobile internet and cloud computing is coming, Enetech actively takes measures and puts forward the concepts of “distance education as a service” and “platform as a service” to meet the market and customer demands. Enetech has launched a new model of “education cloud platform cooperative operation” for various institutional customers.
            </p>
        </div>
    </section>

    <section class="flip-cards-section">
        <div class="flip-card-container">
            <!-- Card 1 -->
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ asset('images/edu/b1.jpeg') }}" alt="Card 1 Image" class="flip-card-image">
                    </div>
                    <div class="flip-card-back">
                        <h3>Industrial E-Learning Platform Cooperative operation</h3>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ asset('images/edu/b2.jpeg') }}" alt="Card 2 Image" class="flip-card-image">
                    </div>
                    <div class="flip-card-back">
                        <h3>Enterprise E-Learning Platform Cooperative operation</h3>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ asset('images/edu/b3.jpeg') }}" alt="Card 3 Image" class="flip-card-image">
                    </div>
                    <div class="flip-card-back">
                        <h3>Further education Platform for technicians Cooperative operation</h3>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ asset('images/edu/b4.jpeg') }}" alt="Card 4 Image" class="flip-card-image">
                    </div>
                    <div class="flip-card-back">
                        <h3>Training Platform for institutions, college, and universities</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="our-solutions-section">
        <div class="our-solutions-container">
            <p class="our-solutions-description">
            Based on the concept of “distance education as a service”, Enetech provides an overall solution with quality and reliable remote education “cloud services” for various colleges and universities, training institutions, enterprises and institutions and government departments.
            </p>
        </div>
    </section>
    
    <section class="edu1-services">
        <div class="edu1-container">
            <div class="edu1-card">
                <img src="{{ asset('images/edu/c1.jpeg') }}" alt="Expert Guidance Image" class="edu1-card-image">
                <h2><b>Introduction to network remote training cloud service project for further education of higher education</b></h2>
                <p>Based on the overall requirements on reforming and developing further education of higher education by the Ministry of Education in Malaysia. Enetech launches the network remote training cloud service solution for further education of higher education for colleges and universities after years of practice.</p>
            </div>
            <div class="edu1-card">
                <img src="{{ asset('images/edu/c2.jpeg') }}" alt="Global Network Image" class="edu1-card-image">
                <h2><b>Remote Training Cloud Service for Non-Academic Programs of Colleges and Universities</b></h2>
                <p>Over the years, Enetech has accumulated rich experience in developing non-academic adult training systems as well as providing remote training cloud service solutions for non-academic programs for colleges and universities.<br><br></p>
            </div>
            <div class="edu1-card">
                <img src="{{ asset('images/edu/c3.jpeg') }}" alt="Client-Centric Approach Image" class="edu1-card-image">
                <h2><b>B2C Online Training Cloud Services for Training Organizations</b></h2>
                <p>The education training industry has entered the era of explosive growth of information. Enetech provides a remote training cloud service solution with maximum economic returns, best business model, and fast setup speed for training institutions.<br><br><br><br></p>
            </div>
            <div class="edu1-card">
                <img src="{{ asset('images/edu/c4.jpeg') }}" alt="Another Approach Image" class="edu1-card-image">
                <h2><b>Network study cloud service for self-study higher education examination</b></h2>
                <p>To comply with the comprehensive reform policies for self-study higher education examination, Enetech builds a "comprehensive network study and evaluation platform for self-study examination”, which is equipped with quality network courses, to help education authorities, colleges and universities in charge of examination, educational colleges and universities (institutions), and students in terms of management, supervision, teaching, learning and cloud service.</p>
            </div>
        </div>
    </section>

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
            .bindPopup('We are here')
            .openPopup();
        });
    </script>

</x-app-layout>
