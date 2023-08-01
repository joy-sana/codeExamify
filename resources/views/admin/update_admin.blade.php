<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register_soumya.css') }}">
    <style>
        body {
            background-image: none;
            background-color: #393646 !important;
            gap: 2rem;
            /* flex-direction: column; */
        }

        .wrapper {
            height: 500px;
            width: 400px;
            margin: 0;
        }

        .update-details--wrapper {
            height: 400px;

        }

        .form-box>h2 {
            font-size: 2rem;
            color: #C1D0B5;
        }

        .update-details-title {
            margin-bottom: 4rem;
        }
    </style>
</head>

<body>
    @include('header')
    <div class="wrapper update-details--wrapper">
        <div class="form-box login">
            <h2 class="update-details-title">Update Details</h2>
            <form action="{{ url('/Admin/UpdateAdminID') }}" method="POST">
                @csrf

                <input type="text" name="adminID" value="{{ auth()->guard('admin_data')->user()->Admin_number }}"
                    hidden>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/user-box-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name="Admin_name" value="{{ $admin->Admin_name }}" required>
                    <label>Admin Name</label>
                    <span class="text-danger">
                        @error('Admin_name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/user-box-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="text" name="Admin_ID" value="{{ $admin->Admin_id }}" required>
                    <label>Admin ID</label>
                    <span class="text-danger">
                        @error('Admin_ID')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="button">Update Name and ID</button>
            </form>
        </div>
    </div>
    <div class="wrapper ">
        <div class="form-box login">
            <h2>Update Password</h2>
            <form action="{{ url('/Admin/UpdatePassword') }}" method="POST">
                @csrf
                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name="current_password" required>
                    <label>Current Password</label>
                    <span class="text-danger">
                        @error('current_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name="new_password" required>
                    <label>New Password</label>
                    <span class="text-danger">
                        @error('new_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">
                    </span>
                    <input type="password" name="confirm_password" required>
                    <label>Confirm New Password</label>
                    <span class="text-danger">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <button type="submit" class="button">Update Password</button>
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
                passwordToggle1.innerHTML =
                    '<img src="{{ asset('svg/lock-open-right-outline.svg') }}" alt="Lock open icon">';
            } else {
                myPassword.type = 'password';
                passwordToggle1.innerHTML = '<img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">';
            }
        });

        passwordToggle2.addEventListener('click', function() {
            if (conPassword.type === 'password') {
                conPassword.type = 'text';
                passwordToggle2.innerHTML =
                    '<img src="{{ asset('svg/lock-open-right-outline.svg') }}" alt="Lock open icon">';
            } else {
                conPassword.type = 'password';
                passwordToggle2.innerHTML = '<img src="{{ asset('svg/lock-outline.svg') }}" alt="Lock icon">';
            }
        });
    </script>
</body>

</html>
