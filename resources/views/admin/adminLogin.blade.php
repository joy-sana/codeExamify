<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/soumo_signin.css') }}">
    <style>
        .wrapper {
            transform: translateY(-65%) translateX(105%) scale(0) ;
            animation: pop-inn .5s forwards ease-in-out !important;
        }

        @keyframes pop-inn {
            0% {
                transform: translateY(-65%) translateX(105%) scale(0);
            }

            100% {
                transform: translateY(0) translateX(0) scale(1);
            }
        }
    </style>
</head>

<body>
    @include('header')
    <div class="wrapper">
        <div class="form-box login">
            <h2>Admin Login</h2>
            <form method="POST" action="{{ route('admin-login') }}">
                @csrf

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/outline-email.svg') }}" alt="Lock icon">

                        {{-- <ion-icon name="mail-outline"></ion-icon> --}}
                    </span>
                    <input type="text" name='admin_id' id="admin_id" required>
                    <label class="email-input" for="email">Adminastrator Id</label>
                    @error('admin_id')
                        {{ $message }}
                    @enderror
                </div>

                <div class="input-box">
                    <span class="icon" id="password-toggle">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                        {{-- <ion-icon name="lock-closed-outline"></ion-icon> --}}
                    </span>
                    <input type="password" id="password" name='password' required>
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
