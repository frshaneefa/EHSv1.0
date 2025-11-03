<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/our_team.css') }}">
    
    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Our Team</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span> Our Team
            </p>
        </div>
    </header>

    <!-- Introduction Section -->
    <section class="section-introduction">
        <div class="container intro-container">
            <p class="intro-text">
                Our team is made up of professionals who are competent, highly skilled, dedicated, and customer oriented. 
                We prioritize continuous learning and updating our skills and knowledge to provide well-informed and 
                reliable services that our clients can trust.
            </p>
            <h2 class="intro-title">Why Choose ENETECH?</h2>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="section-cards">
        <div class="container card-container">
            <div class="card">
            <img src="{{ asset('images/who/1.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Dedicated to Excellence:</h3>
                    <p>Our team is committed to enhancing processes and maintaining top-notch quality assurance standards. This leads to a consistent delivery of high-quality results</p>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/who/2.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Technical Expertise:</h3>
                    <p>Our experienced technical architects empower development teams to efficiently deliver projects, even under tight timelines.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/3.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Customer-Centric:</h3>
                    <p>Our deep understanding of business processes, industry trends, and best practices uniquely equips us to deliver exceptional tailored services.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/4.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Innovation at Your Service:</h3>
                    <p>We provide you with a competitive edge in a rapidly evolving digital landscape by continuously prioritizing innovation.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/5.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Agile and Focused:</h3>
                    <p>We are compact enough to be agile and responsive while being large enough to handle extensive projects with precision.</p>
                </div>
            </div>
            <div class="card">
            <img src="{{ asset('images/who/6.jpeg') }}" alt="Card 1 Image" class="card-image">
                <div class="card-content">
                    <h3>Cultural Affinity:</h3>
                    <p>We understand and adapt to cultural nuances, promoting efficient collaboration.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Bosses Section -->
    <section class="section-bosses">
        <div class="container mx-auto">
            <h2 class="section-title">Meet Our Professional  Teams</h2>
            <div class="boss-container">
                <!-- Boss 1 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Narus.png') }}" alt="Boss 1" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">MD Narus</h3>
                        <p class="member-designation">Director</p>
                        <p class="member-contact">
                            <a href="mailto:narus@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Boss 2 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Tiaq.png') }}" alt="Boss 2" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Izdihar Abdul Wahab</h3>
                        <p class="member-designation">Business Development Director</p>
                        <p class="member-contact">
                            <a href="mailto:izdihar@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                
                <!-- Boss 3 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Lah.png') }}" alt="Boss 3" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Abdullah Egol</h3>
                        <p class="member-designation">Account Manager</p>
                        <p class="member-contact">
                            <a href="mailto:abdullah@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Boss 4 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Zuhairi.jpeg') }}" alt="Boss 4" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Mohd Zuhairi</h3>
                        <p class="member-designation">Account Manager</p>
                        <p class="member-contact">
                            <a href="mailto:mz.seman@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>

                <!-- Boss 5 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Fatin.png') }}" alt="Boss 5" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Nik Nur Fatin Aisyah</h3>
                        <p class="member-designation">Admin Executive</p>
                        <p class="member-contact">
                            <a href="mailto:fatinaisyah@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Boss 6 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Nad.png') }}" alt="Boss 6" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Nurulnadhirah</h3>
                        <p class="member-designation">Project Manager</p>
                        <p class="member-contact">
                        <a href="mailto:nadhirah@enetech.com.my"><i class="fas fa-envelope"></i></a>
                        <!--  <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Boss 7 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Kimi.png') }}" alt="Boss 7" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Mohamad Rakimi</h3>
                        <p class="member-designation">Project Manager</p>
                        <p class="member-contact">
                        <a href="mailto:rakimi@enetech.com.my"><i class="fas fa-envelope"></i></a>
                        <!--  <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Boss 8 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Din.png') }}" alt="Boss 8" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Muhd Khairuddin</h3>
                        <p class="member-designation">Technical Manager</p>
                        <p class="member-contact">
                            <a href="mailto:khairuddin@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>               
            </div>
        </div>
    </section>

    <!-- Other Team Members Section -->
    <section class="section-other-members">
        <div class="container mx-auto">
            <div class="other-members-container">
                <!-- Other Member 2 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Amri.png') }}" alt="Member 2" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Khairul Amri</h3>
                        <p class="member-designation">Presales Consultant</p>
                        <p class="member-contact">
                            <a href="mailto:amri@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Other Member 3 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Ainin.png') }}" alt="Member 3" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Ainin Sofia</h3>
                        <p class="member-designation">Sales Coordinator</p>
                        <p class="member-contact">
                            <a href="mailto:nurainin@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!-- <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Other Member 4 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Mira.png') }}" alt="Member 4" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Fatin Amira</h3>
                        <p class="member-designation">Project Coordinator</p>
                        <p class="member-contact">
                        <a href="mailto:fatinmira@enetech.com.my"><i class="fas fa-envelope"></i></a>
                        <!--  <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> --> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="other-members-container">
                <!-- Other Member 6 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Shah.png') }}" alt="Member 6" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Shah Ikmal</h3>
                        <p class="member-designation">System Engineer</p>
                        <p class="member-contact">
                        <a href="mailto:mohd.shah@enetech.com.my"><i class="fas fa-envelope"></i></a>
                        <!--  <a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> --> 
                        </p>
                    </div>
                </div>
                <!-- Other Member 7 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Faris.png') }}" alt="Member 7" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Faris Irfan</h3>
                        <p class="member-designation">System Engineer</p>
                        <p class="member-contact">
                        <a href="mailto:frshaneefa@enetech.com.my"><i class="fas fa-envelope"></i></a>
                        <!--<a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
                <!-- Other Member 8 -->
                <div class="team-member">
                    <img src="{{ asset('images/team/Adam.png') }}" alt="Member 8" class="member-image">
                    <div class="member-info">
                        <h3 class="member-name">Adam Wiryahadi</h3>
                        <p class="member-designation">System Engineer</p>
                        <p class="member-contact">
                            <a href="mailto:m.adam@enetech.com.my"><i class="fas fa-envelope"></i></a>
                            <!--<a href="https://linkedin.com/in/member8" target="_blank"><i class="fab fa-linkedin"></i></a> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
