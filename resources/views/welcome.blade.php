<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EHSv1</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css"></link>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>
<body style="background-image: url('{{ asset('images/BG_1 (1).jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container" id="container">

        <div class="form-container register-container">
            <form action="#">
                <img src="{{ asset('images/logoene.jpg') }}" alt="Enetech Logo Image" style="width: 100px; height: auto;">
                <h3>Register Are Closed For Now.</h3>
                    <p>Please provide the details for the registraion:<br>Name<br>Email<br>Contact Number<br>Agensi<br>Address</p>
                    <p>Our support team will create an account for you.</p>
                    <!-- <input type="text" placeholder="Name"></input>
                    <input type="email" placeholder="Email"></input>
                    <input type="password" placeholder="Password"></input>
                    <button>Register</button> -->
            </form>
        </div> 
        
        <div class="form-container login-container">
            <form method="POST" action="{{ route('login') }}">
                <img src="{{ asset('images/logoene.jpg') }}" alt="Enetech Logo Image" style="width: 100px; height: auto;">
                    <br>
                <h1>Login here.</h1>
                @csrf

                <!-- Email Address -->
                
                    <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                

                <!-- Password -->
                
                    <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                
                    <div class="content">
                        <div class="checkbox">
                            <input id="remember_me" type="checkbox" name="remember"></input>
                            <label>Remember me</lable>
                        </div>
                        <!-- Forgot Password Link -->
                        @if (Route::has('password.request'))
                            <div class="pass-link">
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        @endif
                    </div>

                
                <!-- Login Button -->
                <button type="submit">Log in</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Dear Valued<br> Customers</h1>
                    <p>Please send an email to <br><b>support@enetech.com.my /<br> PIC: +601137882324</b><br> for the registration. TQ</p>
                    <button class="ghost" id="login">Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Welcome to <br> Enetech Helpdesk & Support </h1>
                    <p>if you dont have an account yet, join us and start your journey.</p>
                    <button class="ghost" id="register">Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const registerButton = document.getElementById("register");
        const loginButton = document.getElementById("login");
        const container = document.getElementById("container");

        registerButton.addEventListener("click", () => {
            container.classList.add("right-panel-active");
        });

        loginButton.addEventListener("click", () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>
