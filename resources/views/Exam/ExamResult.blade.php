<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image" rel="dhotycut icon" href="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}">
    <title>CodeExamify</title>
    <style>
        body {
            background-color: #393646 !important;
        }

        .result-page {
            text-align: center;
            /* margin-top: 30px; */
        }

        .result-page > h1 {
margin: 2rem auto;
            color: #F4EEE0;
        }

        p {
            font-size: 18px;
        }

        .marks {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .result-btn-grp {

            width: 500px;
            margin: 2rem auto;
        }
        .back-home,
        .retake-test{
            width: 200px;
        }
        .red{
            color:#D21312;
        }
        .green{
            color:#16FF00;
        }

    </style>
</head>

<body>
    @include('header')
    <div class="result-page">
        <h1>Exam Results</h1>
        <p>Total Marks: <span>15</span></p>
        <p>Your Marks: <span>{{ $marks }}</span></p>
        <p>Percentage: <span id="percentage"></span></p>




        <div class="result-btn-grp">
            <a href="{{ url('/home') }}"><button class="btn-log back-home">Go To Home</button></a>
            <a href="{{ url('/exam') }}/{{ $subjectId }}"><button class="btn-log btn-log-admin retake-test">Retake
                    Exam</button></a>
        </div>
    </div>
    @include('footer')

    <script>
        var totalMarks = 15;
        var yourMarks = {{$marks}};
    
        var percentage = (yourMarks / totalMarks) * 100;
    
        var percentageElement = document.getElementById('percentage');
        percentageElement.textContent = percentage.toFixed(2) + '%';
    
        if (percentage < 30) {
            percentageElement.style.color = '#D21312';
        } else if (percentage < 80) {
            percentageElement.style.color = 'yellow';
        } else {
            percentageElement.style.color = '#16FF00';
        }
    </script>
    

</body>

</html>
