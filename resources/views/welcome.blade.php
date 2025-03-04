<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enetech Login</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <div class="logo-container">
        <img src="{{ asset('images/logoene.png') }}" alt="Enetech Logo" class="logo">
    </div>
    
    <!-- Login container -->
    <div id="login-container" class="container">
        <h1>Login to your account</h1>
        <p>Don't have an account yet? <br> Please contact our Admin to register.</p>
        <p><strong>📱 Contact Admin: <a href="tel:01137882324">011-3788-2324</a></strong></p>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <div class="content">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>
            <button type="submit" class="button">Log In</button>
        </form>
    </div>
</body>
</html>
