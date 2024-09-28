<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <style>
    header {
        background-image: url('{{ asset('images/header1.jpeg') }}');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 70vh;
    }
    </style>

    <header>
        <div class="container">
            <h1>Modern IT & TECH<br>Service Solutions</h1>
            <p>Specialize in providing a comprehensive suite of services, <br> ranging from cutting-edge ICT solutions to reliable <br> maintenance support.</p>
            <a href="{{ route('company.contact') }}" class="btn btn-contact">Contact Us</a>
        </div>
    </header>

    <section class="services">
        <div class="container mx-auto">
            <div class="card">
                <i class="fas fa-cogs fa-3x"></i>
                <h2><b>IT SERVICES</b></h2>
                <p>Outsource Your Critical IT Requirements with us and move ahead from your competitors.</p>
            </div>
            <div class="card">
                <i class="fas fa-headset fa-3x"></i>
                <h2><b>24/7 IT Support</b></h2>
                <p>We provide quick support 24/7 help desk service options to our clienteles.</p>
            </div>
            <div class="card red-background">
                <h2><b>Custom Request</b></h2>
                <p>Any IT Service will be developed on an individual case basis with cost-effective solutions.</p>
                <a href="{{ route('company.contact') }}" class="btn btn-contact">Find Solution</a>
            </div>
        </div>
    </section>

    <section class="about-us">
        <div class="container">
            <div class="about-us-content">
                <img src="{{ asset('images/home1.jpeg') }}" alt="About Us Image" class="about-us-image">
                <div class="about-us-text">
                    <h2 class="about-us-title">ABOUT US</h2>
                    <h1 class="about-us-heading">Let Us Be Your Partners Preferred IT Partner</h1>
                    <p class="about-us-description">
                        Founded with a vision to empower businesses with innovative ICT solutions, Enetech Sdn Bhd is dedicated to delivering excellence in technology services. Our commitment extends beyond providing solutions; we strive to be your trusted partner in navigating the digital landscape.
                    </p>
                    <a href="{{ route('company.contact') }}" class="btn btn-get-started">GET STARTED</a>
                    <br></br>
                    <ul class="about-us-list">
                        <li><i class="fas fa-check-circle"></i> We are committed to providing quality IT Services</li>
                        <li><i class="fas fa-check-circle"></i> Provided by experts to help challenge critical activities</li>
                        <li><i class="fas fa-check-circle"></i> Really know the true needs and expectations of customers</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <hr class="custom-hr">

    <section class="our-services">
        <div class="container">
            <h2 class="our-services-title">OUR SOLUTION</h2>
            <h1 class="our-services-heading">When an innovative technology is well integrated in your organization you can see the benefits immediately</h1>
            <p class="our-services-description">
            Building a robust foundation for your business 
            <br><br> Technologies are converging in the digital age and the incredible opportunities this creates are drool-worthy. At ENETECH, we have a holistic and integrated approach towards core modernization to experience technological evolution to the next level, which will help in reimagining your IT infrastructure.
            <br><br> At ENETECH, we are helping enterprises with cost-effective and responsive IT infrastructure services. This helps in enhancing their operational efficiencies, boosting performance, increasing productivity and accelerating the time-to-market with reduced cost.
            </p>

            <!-- Start of the new cards section -->
            <div class="services-cards">
            <div class="card">
                    <img src="{{ asset('images/solution/s4.jpeg') }}" alt="Technical Expertise Image">
                    <h3>Technical Expertise</h3>
                    <p>Our experienced technical architects empower development teams to efficiently deliver projects, even under tight timelines.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('images/solution/s1.jpeg') }}" alt="Enterprise Services Image">
                    <h3>Enterprise Services</h3>
                    <p>ENETECH helps you integrate the old shared services process into a new unique approach by reworking on your current operating model while streamlining and automating workflows.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('images/solution/s3.jpeg') }}" alt="Managed IT Services Image">
                    <h3>Managed IT Services</h3>
                    <p>ENETECH has the ability to anticipate and orchestrate change in technology and business practices while offering tangible solutions. We are one of the premium providers of Managed IT service across the country. We uniquely build solutions to drive cost optimization, effectiveness, and innovative IT operations.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('images/ourservices/2.jpg') }}" alt="Data Center Services Image">
                    <h3>Data Center Services & Management</h3>
                    <p>Our Data Center Services help businesses manage and address the requirements to ensure constant delivery of data center operations and management services to their users for all their business critical applications.</p>
                </div>
                
            </div>
            <!-- End of the new cards section -->

        </div>
    </section>   

    <section class="it-consulting">
        <div class="container">
            <h2 class="section-title">IT Consulting & Solution</h2>
            <div class="cards-wrapper">
                <div class="card">
                    <img src="{{ asset('images/consulting/1.jpg') }}" alt="IT Maintenance Image">
                    <div class="card-content red-background">
                        <i class="fas fa-cogs"></i> <!-- Replace with the relevant icon -->
                        <h3>IT MAINTENANCE</h3>
                    </div>
                    <p>We design personalized and customized managed service plans for your business.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('images/consulting/2.png') }}" alt="Web Development Image">
                    <div class="card-content red-background">
                        <i class="fas fa-code"></i> <!-- Replace with the relevant icon -->
                        <h3>WEB DEVELOPMENT</h3>
                    </div>
                    <p>A business website plays a major role in depicting your intentions and goals.</p>
                </div>
                <div class="card">
                    <img src="{{ asset('images/consulting/3.png') }}" alt="App Development Image">
                    <div class="card-content red-background">
                        <i class="fas fa-mobile-alt"></i> <!-- Replace with the relevant icon -->
                        <h3>APP DEVELOPMENT</h3>
                    </div>
                    <p>We stay updated to deliver advanced enterprise software solutions.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-info">
        <div class="contact-banner">
            <h2>Don't Hesitate To Contact Us For Better Information And Services</h2>
        </div>

        <div class="cards-container">
        <!-- Existing Card -->
        <div class="overlap-card">
            <!-- Existing Red Section -->
            <div class="red-section">
                <h3>Perfect Solutions For Your Business</h3>
                <p>Our team is made up of professionals who are competent, highly skilled, dedicated, and customer oriented.</p>
                <ul class="solutions-list">
                    <li><i class="fas fa-check"></i> We are committed to providing quality IT Services</li>
                    <li><i class="fas fa-check"></i> Provided by experts to help challenge critical activities</li>
                    <li><i class="fas fa-check"></i> Really know the true needs and expectations of customers</li>
                    <li><i class="fas fa-check"></i> Processes of achieving the excellence improvements</li>
                </ul>

                <div class="button-group">
                    <a href="{{ route('company.contact') }}" class="btn btn-quote">GET A QUOTE</a>
                    <a href="{{ route('company.home') }}" class="btn btn-started">
                        GET STARTED <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- New White Section with Form -->
            <div class="white-section">
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
                        <label for="details">Additional Details</label>
                        <textarea id="details" name="details" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </section>


    <!-- Trusted Organizations Section -->
    <section class="trusted-organizations">
        <h2 class="trust-h2"><b>Trusted By The Country's Best Organizations</b></h2>
        <div class="logo-container">
            <div class="logo-wrapper">
                <div class="logo-slider">
                    <!-- Logo 1 -->
                    <div class="logo-card">
                        <img src="images/organization/1.png" alt="Organization 1">
                    </div>
                    <!-- Logo 2 -->
                    <div class="logo-card">
                        <img src="images/organization/2.png" alt="Organization 2">
                    </div>
                    <!-- Logo 3 -->
                    <div class="logo-card">
                        <img src="images/organization/3.png" alt="Organization 3">
                    </div>
                    <!-- Logo 4 -->
                    <div class="logo-card">
                        <img src="images/organization/4.png" alt="Organization 4">
                    </div>
                    <!-- Logo 5 -->
                    <div class="logo-card">
                        <img src="images/organization/5.png" alt="Organization 5">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/6.png" alt="Organization 6">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/7.png" alt="Organization 7">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/8.png" alt="Organization 8">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/9.png" alt="Organization 9">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/10.png" alt="Organization 10">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/11.png" alt="Organization 11">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/12.png" alt="Organization 12">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/13.png" alt="Organization 13">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/14.png" alt="Organization 14">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/15.png" alt="Organization 15">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/16.png" alt="Organization 16">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/17.png" alt="Organization 17">
                    </div>
                    <div class="logo-card">
                        <img src="images/organization/18.png" alt="Organization 18">
                    </div>
                    <!-- Add more logos as needed -->
                </div>
            </div>
        </div>

        <!-- Left Button (Outside) -->
        <button class="slide-btn left-btn">
            <span><i class="fas fa-chevron-left"></i></span>
        </button>

        <!-- Right Button (Outside) -->
        <button class="slide-btn right-btn">
            <span><i class="fas fa-chevron-right"></i></span>
        </button>
    </section>

    <!-- JavaScript to make the slider work with buttons -->
    <script>
        const logoWrapper = document.querySelector('.logo-wrapper');
        const leftBtn = document.querySelector('.left-btn');
        const rightBtn = document.querySelector('.right-btn');

        const slideAmount = 300; // Adjust the scroll step based on your needs

        rightBtn.addEventListener('click', () => {
            logoWrapper.scrollBy({ left: slideAmount, behavior: 'smooth' });
        });

        leftBtn.addEventListener('click', () => {
            logoWrapper.scrollBy({ left: -slideAmount, behavior: 'smooth' });
        });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.card'); // Select all cards

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show'); // Add the 'show' class when in view
                    observer.unobserve(entry.target);   // Stop observing once the card has appeared
                }
            });
        }, {
            threshold: 0.1 // Trigger when 10% of the card is visible
        });

        // Observe each card
        cards.forEach(card => {
            observer.observe(card);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const aboutUsElements = document.querySelectorAll('.about-us .about-us-content, .about-us .about-us-text, .about-us .about-us-image, .about-us .about-us-list li');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show'); // Add 'show' class when in view
                    observer.unobserve(entry.target);   // Stop observing once the element has appeared
                }
            });
        }, {
            threshold: 0.1 // Trigger when 10% of the element is visible
        });

        // Observe each element
        aboutUsElements.forEach(element => {
            observer.observe(element);
        });
    });
    </script>


</x-app-layout>
