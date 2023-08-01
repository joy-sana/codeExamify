<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image" rel="dhotycut icon" href="{{asset('css/image/LogoMakerCa-1682859900065.png')}}">
    <link rel="stylesheet" href="{{ asset('css/soumo_signin.css') }}">
</head>

<body>
    @include('header')
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @if (Session::has('success'))
                    <span>{{ Session::get('success') }}</span>
                @endif
                @if (Session::has('fail'))
                    <span>{{ Session::get('fail') }}</span>
                @endif
                @csrf

                <div class="input-box">
                    <span class="icon email-icon">
                        <img src="{{ asset('svg/outline-email.svg') }}" alt="Lock icon">
                    </span>

                    <input type="text" name='email' required>
                    <label class="email-input" for="email">Email</label>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <div class="input-box">
                    <span class="icon" id="password-toggle">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name='password' required>
                    <label class="pwd">Password</label>
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

                <div class="remember-forgot">
                    <label>
                        <input type="checkbox">
                        Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" value="Sign-in" class="button" name="submit">

                <div class="Login-register">
                    <p>Dont have an account?<a href="{{ url('/register') }}" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const passwordToggle = document.getElementById('password-toggle');
        const passwordInput = document.querySelector('input[name="password"]');

        passwordToggle.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.innerHTML =
                    '<img src="{{ asset('svg/lock-open-right-outline.svg') }}" alt="Lock open icon">';
            } else {
                passwordInput.type = 'password';
                passwordToggle.innerHTML = '<img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">';
            }
        });
    </script>

</body>

</html>
