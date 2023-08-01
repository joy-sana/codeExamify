<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image" rel="dhotycut icon" href="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}">
    <link rel="stylesheet" href="{{ asset('css/feedback.css') }}">
</head>

<body>
    @include('header')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="feedback-form-wrapper">


        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf
            
            @if (auth()->guard('user_data')->check())
                <input id="username" type="text" name="username"
                    value="{{ auth()->guard('user_data')->user()->name }}">
            @else
                <input class="username" id="username" type="text" name="username" value="Anonymous user">
            @endif

            <div>
                <h2>Write your Feedback Here...</h2>

            </div>
            <textarea id="content" name="content" placeholder="Write something...." required></textarea>
            <div>
                <button class="btn-log" id="myButton" type="submit" onclick="submitForm()">Submit</button>

            </div>
        </form>

    </div>
    @include('footer')
</body>

</html>
