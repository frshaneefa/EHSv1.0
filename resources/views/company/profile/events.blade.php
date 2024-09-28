<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    
    <!-- Header Section -->
    <header class="header-section" style="background-image: url('{{ asset('images/header1.jpeg') }}');">
        <div class="container mx-auto">
            <h1 class="header-title">Our Events</h1>
            <p class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> <span class="separator">&gt;</span> Events
            </p>
        </div>
    </header>
    
    <!-- Events Section -->
    <section class="events-section">
        <div class="container mx-auto">
            <div class="events-flex">
                @foreach (range(2024, 2023) as $year)
                <div class="event-card" onclick="showYearContent('yearContent{{ $year }}')">
                    <!-- <img src="{{ asset('images/events/event' . $year . '_1.jpg') }}" alt="{{ $year }} Event"> -->
                    <h3>{{ $year }}</h3>
                </div>
                @endforeach
            </div>

            <!-- Year Event Contents -->
            @foreach (range(2024, 2023) as $year)
            <div class="event-content" id="yearContent{{ $year }}" style="display: none;">
                <h2 class="y-event"><b>{{ $year }} Event Details</b></h2>

                <!-- Loop through each month -->
                @foreach (range(1, 12) as $month)
                    @php
                        $hasEvents = false;
                        $imageUrls = [];
                        // Check if images exist for this month in the year
                        for ($i = 1; $i <= 10; $i++) {
                            $imagePath = 'images/events/event' . $year . '_' . $month . '_' . $i . '.jpg';
                            if (file_exists(public_path($imagePath))) {
                                $imageUrls[] = asset($imagePath); // Store the valid image URLs
                                $hasEvents = true; // Mark that this month has events
                            }
                        }
                    @endphp

                    @if ($hasEvents)
                    <div class="month-card">
                        <h3>{{ DateTime::createFromFormat('!m', $month)->format('F') }} {{ $year }}</h3> <!-- Display month name and year -->
                        
                        <!-- Month Event Content -->
                        <div class="image-gallery">
                            @foreach ($imageUrls as $imageUrl)
                                <img src="{{ $imageUrl }}" alt="{{ $year }} {{ DateTime::createFromFormat('!m', $month)->format('F') }} Event Image">
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

    <script>
        // Show year content
        function showYearContent(id) {
            var content = document.getElementById(id);
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }

    </script>

</x-app-layout>
