<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register_soumya.css') }}">

    <style>
        
        body{
            background-image: none;
            background-color: #393646 !important;
        }
        .wrapper{
            height: 500px;
            margin: 0;
        }
        .form-box >h2{
            font-size: 2rem;
            color:#C1D0B5;
        }
    </style>

</head>

<body>
    @include('header')
    <div class="wrapper">
        <div class="form-box login">
            <h2> Admin Registration</h2>
            <form action="{{ url('/Admin/newAdmin') }}" method="POST">
                @csrf
                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/user-box-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name='fullName' required>
                    <label>Admin Name</label>
                    <span class="text-danger">
                        @error('fullName')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/user-box-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name='adminID' required>
                    <label>Admin Id</label>
                    <span class="text-danger">
                        @error('fullName')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                


                <div class="input-box">
                    <span class="icon" id="password-toggle1">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name='Password' id="mypwd" required>
                    <label>Create password </label>
                    <span class="text-danger">
                        @error('Password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon" id="password-toggle2">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name='C_Password' id="conpwd" required>
                    <label>Confirm password</label>
                    <span class="text-danger">
                        @error('C_Password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="button">Register</button>
            </form>
        </div>
    </div>
{{-- @include('footer') --}}
    <script>

        const passwordToggle1 = document.getElementById('password-toggle1');
        const passwordToggle2 = document.getElementById('password-toggle2');
        const myPassword = document.getElementById('mypwd');
        const conPassword = document.getElementById('conpwd');
        const lockIcon = '<img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">';
        const unlockIcon = '<img src="{{ asset('svg/lock-open-outline.svg') }}" alt="Unlock icon">';

        // Add click event listener to password toggle button
        passwordToggle1.addEventListener('click', function() {
            if (myPassword.type === 'password') {
                myPassword.type = 'text';
                passwordToggle1.innerHTML ='<img src="{{ asset('svg/lock-open-right-outline.svg') }}" alt="Lock open icon">';
            } else {
                myPassword.type = 'password';
                passwordToggle1.innerHTML = '<img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">'; 
            }
        });

        passwordToggle2.addEventListener('click', function() {
            if (conPassword.type === 'password') {
                conPassword.type = 'text';
                passwordToggle2.innerHTML = '<img src="{{ asset('svg/lock-open-right-outline.svg') }}" alt="Lock open icon">';
            } else {
                conPassword.type = 'password';
                passwordToggle2.innerHTML = '<img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">';      
            }
        });


    </script>
</body>

</html>
