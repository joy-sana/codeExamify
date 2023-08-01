<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('/css/form.css')}}">
    <script src="{{asset('/js/showpass.js')}}"></script>
    <title>Document</title>
</head>
<body>
    @include('header')

    <form action="{{$ChangeUrl}}" method="post">
        @if(Session::has('success'))
        <span>{{Session::get('success')}}</span>
        @endif
        @if(Session::has('fail'))
        <span>{{Session::get('fail')}}</span>
        @endif
        @csrf
        
        <div>
            <label for="mypwd">Old Password:</label>
            <div class="password-input-container">
                <input type="password" placeholder="Enter Previos password" name='oldPassword' id="mypwd" value="" required>
                <div class="show-password-container">
                    <input type="checkbox" onclick="myFunction('mypwd')" id="show-password-checkbox">
                    <label for="show-password-checkbox"><i class="fas fa-eye"></i></label>
                </div>
                <span class="text-danger">
                    @error ('oldPassword')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div>
            <label for="conpwd">New Password:</label>
            <div class="password-input-container">
                <input type="password" placeholder="Enter A New Password" name='newPassword' id="conpwd" required>
                <span class="text-danger">
                    @error ('newPassword')
                    {{$message}}
                    @enderror
                </span>
                <div class="show-password-container">
                    <input type="checkbox" onclick="myFunction('conpwd')" id="show-password-checkbox-2">
                    <label for="show-password-checkbox-2"> <i class="fas fa-eye"></i></label>
                </div>
            </div>
        </div>

        <div>
            <label for="conpwd">Confirm New Password:</label>
            <div class="password-input-container">
                <input type="password" placeholder="Re-enter New Password" name='confirmNewPassword' id="con-new-pass" required>
                <span class="text-danger">
                    @error ('confirmNewPassword')
                    {{$message}}
                    @enderror
                </span>
                <div class="show-password-container">
                    <input type="checkbox" onclick="myFunction('con-new-pass')" id="show-password-checkbox-3">
                    <label for="show-password-checkbox-3"> <i class="fas fa-eye"></i></label>
                </div>
            </div>
        </div>

        <div>
            <input type="submit" value="Change Password" name='submit' >
        </div>

    </form>
</body>
</html>