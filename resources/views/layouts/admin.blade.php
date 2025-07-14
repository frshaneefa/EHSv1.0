<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'EHSv1') }} - Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (with Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        confirmButtonColor: '#d33'
                    });
                </script>
            @endif

            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#3085d6'
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "{{ session('error') }}",
                        confirmButtonColor: '#d33'
                    });
                </script>
            @endif

    <!-- Navbar -->
    @include('layouts.partials.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.partials.aside')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{ $slot }}
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- Chart jss -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.notification');
            notifications.forEach(notification => {
                notification.classList.add('show'); // Show the notification

                // Automatically hide the notification after 5 seconds
                setTimeout(() => {
                    notification.classList.remove('show'); // Hide the notification
                }, 5000); // 5000ms = 5 seconds
            });
        });
    </script>
</body>
</html>
