<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register_soumya.css') }}">


</head>

<body>
    @include('header')
    <div class="wrapper">
        <div class="form-box login">
            <h2>Registration</h2>
            <form action="{{ url('/') }}/register" method="POST">
                @csrf
                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/user-box-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name='fullName' required>
                    <label>Fullname</label>
                    <span class="text-danger">
                        @error('fullName')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/alternate-email.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name="Username" required>
                    <label>Username</label>
                    <span class="text-danger">
                        @error('Username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/phone-enabled-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name='phoneNumber' required>
                    <label>Phone Number</label>
                    <span class="text-danger">
                        @error('phoneNumber')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/outline-email.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name='Email_id'required>
                    <label>Email</label>
                    <span class="text-danger">
                        @error('Email_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class=" input-box-dob-gender">
                    <div class=" input-box-gender">
                        <label class="gender-label" for="gender-select">Gender</label>
                        <select id="gender-select" name="gender" required>
                            <option value="" disabled selected>Select gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Others</option>
                        </select>
                    </div>



                    <div class="input-box input-box-date">
                        <input type="date" name="dob">
                        <label>Date of Birth</label>
                    </div>
                </div>



                <div class="input-box">
                    <span class="icon" id="password-toggle1">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name='Password' id="mypwd" minlength="8" required>
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
                    <input type="password" name='C_Password' id="conpwd" minlength="8" required>
                    <label>Confirm password</label>
                    <span class="text-danger">
                        @error('C_Password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="button">Register</button>
                <div class="Login-register">
                    <p>Already have an account?<a href="{{ url('/login') }}">login</a></p>
                </div>
            </form>
        </div>
    </div>


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


        // gender dropdown section
        const genderSelect = document.getElementById('gender-select');
        const genderLabel = document.getElementById('gender-label');

        genderSelect.addEventListener('change', () => {
            if (genderSelect.value !== '') {
                genderLabel.textContent = genderSelect.options[genderSelect.selectedIndex].text;
            } else {
                genderLabel.textContent = '';
            }
        });
    </script>
</body>

</html>
