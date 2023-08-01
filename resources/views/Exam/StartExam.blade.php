<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/startExam.css') }}">
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
			text-align: center;
			background-color: #f2f2f2;
		}
		h1 {
            color:black;
			font-size: 3em;
			margin-top: 2em;
		}
		p {
            color:black;
            font-size: 1.5em;
			margin-top: 1em;
			margin-bottom: 3em;
		}

        .start-exam{
            scale: 1.5;
            margin: 2rem;
        }
    </style> --}}

    {{-- <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .container1 {
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #1877CD;
            padding: 15px 0;
            color: rgb(255, 255, 255);
        }

        .name,
        .type {
            padding: 10px;
        }

        .container2 {
            display: flex;
            align-items: center;
            justify-content: left;
            background-color: lightblue;
            padding: 20px;
            background: transparent;
        }

        .container2 .exam {
            background-color: rgb(35, 89, 240);
            color: white;
            font-size: 2rem;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }

        .container2 .exam:hover {
            background-color: rgb(33, 33, 171);
        }

        .container2 .checkbox {
            font-size: 25px;
            padding-left: 30px;
        }

        .container3 {
            display: flex;
            font-size: 32px;
            padding: 20px;

        }

        .container3 .leftbox {
            position: absolute;
            bottom: 18%;
            left: 2%;
            width: 40%;
            max-width: 700px;
        }

        .container3 .rightbox {
            position: absolute;
            bottom: 28%;
            right: 0%;
            width: 25%;
            padding-right: 20px;
            max-width: 480px;
        }

        .container3 .rightbox div {
            padding-bottom: 10px;
        }
    </style> --}}

</head>

<body>
    @include('header')
    {{-- <h1>Welcome to the Exam!</h1>
	<p>Please read the instructions carefully before starting the exam.</p>
    <a href="{{url('/exam/5')}}">
        <button class="btn-log start-exam">Start Exam</button>
    </a> --}}
    <header class="Start-Exam-Head">
        <div class="container1">
            <div class="name">
                <h3>{{$subjectROW->subject_name}}</h3>
            </div>
            <div class="type">
                <h3>Type: <span class="yellow">Web Devlopment</span></h3>
            </div>
        </div>
    </header>

    <main>


        <div class="container3">
            <div class="leftbox">
                <h2>Details About <span class="yellow">{{$subjectROW->subject_name}}</span></h2>
                <p>{{$subjectROW->description}}
                </p>
            </div>
            <div class="rightbox">
                <div class="text">Time: <span class="yellow">15 Minutes</span></div>
                <div class="text">Dificulty: <span class="yellow">Medium</span></div>
                <div class="text">Questions: <span class="yellow">15</span></div>
            </div>

        </div>

        <div class="container2">
            <div class="button">
                <a href="{{ url('/exam') }}/{{$subjectROW->id}}">
                    <button class="exam">Start Exam</button>
                </a>
            </div>
        </div>
        <div class="instruction-bar">
            <p>Please read the instructions carefully before starting the exam.</p>
        </div>
    </main>
    @include('footer')
</body>

</html>
