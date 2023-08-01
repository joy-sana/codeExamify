<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@700&family=Poppins&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: #393646;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;

            font-family: 'Poppins', sans-serif;

        }

        .signup-success {
            display: grid;
            grid-template-columns: 1fr 1fr;
            height: 65vh;
            width: 60vw;
            background-color: #16FF00;
            padding: 1.5rem;
            border-radius: 8px;
            grid-gap: 0rem;
            color: #D4F6CC;
        }

        h2 {
            margin-top: 0rem;
            color: #D2001A;
            grid-column: span 2;
            text-align: center;
            font-size: 2rem;
            font-family: 'Fira Code', monospace;
            animation-name: bounceIn;
            animation-duration: 15s;
            text-shadow: 0  4px 10px rgba(0, 0, 0, 0.717);
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }

            10% {
                opacity: 1;
                transform: scale(1.05);
            }

            12% {
                opacity: 1;
                transform: scale(1);
            }

            20% {
                opacity: 1;
                transform: scale(1);
            }

            30% {
                opacity: 0;
            }

            40% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            60% {
                opacity: 1;

            }

            70% {
                opacity: 0;
            }

            80% {
                opacity: 1;
            }

            90% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        h3 {
            text-align: center;
            grid-column: span 2;
            color:#003865;
            margin:-1rem 0;
        }

        p {
            color:#2C272E;
            grid-column: span 2;
            text-align: justify;

        }

        a {
            justify-self: center;

        }

        button {
            text-transform: capitalize;
            width: 28vw;
            padding: .5rem;
            margin: auto;
            border-radius: 20px;
            background-color: transparent;
            border: 3px solid #D2001A;
            transition: all .3s ease-in-out;
            color: #D2001A
        }

        button:hover {
            margin-top: -5px;
            /* color: #000; */
            /* box-shadow: inset 0 -50px 0 0#D2001A; */
        }
    </style>
</head>

<body>
    <div class="signup-success">
        <h2>Congratulations!</h2>
        <h3>You have successfully created an account on CodeExamify</h2>

            <p>Your go-to destination for taking online coding exams. You are now one step closer to achieving your
                coding goals. Get ready to take on some challenging coding exams and test your skills. Thank you for
                choosing CodeExamify, and we wish you all the best in your coding journey!</p>
            <a href="{{url('/home')}}"><button class="btn-home">go back home</button></a>
            <a href="{{url('/login')}}"><button class="btn-signin">go to login</button></a>
    </div>
</body>

</html>