<x-user-layout>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Welcome Card -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Welcome to Your Dashboard</h3>
                        </div>
                        <div class="card-body text-left">
                            <div class="fade-in-from-below">
                                <p class="line1 mb-3">Welcome to <strong>Enetech Helpdesk Support Version 1.0 (EHSv1.0)</strong></p>
                                <p class="line2 mb-3">We're delighted to welcome you to our ticketing system. Whether you're here to report an issue, request assistance, or seek information, we're here to ensure your experience is smooth and productive.</p>
                                <p class="line3 mb-3">Should you have any questions or require assistance, please don't hesitate to contact our support team. We're dedicated to providing you with prompt and efficient assistance.</p>
                                <p class="line4">Thank you for choosing Enetech Helpdesk Support. Let's streamline your support experience together!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <!-- Action Cards -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-plus-circle"></i> Create a Ticket
                            </h5>
                            <p class="card-text">Report an issue or request assistance from our support team.</p>
                            <a href="#" class="btn btn-light">Create Ticket</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-eye"></i> View My Tickets
                            </h5>
                            <p class="card-text">Check the status of your submitted tickets.</p>
                            <a href="#" class="btn btn-light">View Tickets</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-envelope"></i> Contact Support
                            </h5>
                            <p class="card-text">Get in touch with our support team for urgent inquiries.</p>
                            <a href="#" class="btn btn-light">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</x-user-layout>

<style>
    @keyframes fade-in-from-below {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-from-below .line1 {
        animation: fade-in-from-below 1s ease-out forwards 0.2s;
    }

    .fade-in-from-below .line2 {
        animation: fade-in-from-below 1s ease-out forwards 0.4s;
    }

    .fade-in-from-below .line3 {
        animation: fade-in-from-below 1s ease-out forwards 0.6s;
    }

    .fade-in-from-below .line4 {
        animation: fade-in-from-below 1s ease-out forwards 0.8s;
    }
</style>
