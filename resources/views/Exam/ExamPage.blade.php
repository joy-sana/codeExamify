<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ExamPage.css') }}">

</head>

<body>
    @include('header')
    <div class="Exam-wrapper">

        <div class="exam-nav-bar">
            <h4><span>15</span> Questions</h4>
            <div class="timer-wrapper">
                <div class="timer-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M128 44a96 96 0 1 0 96 96a96.11 96.11 0 0 0-96-96Zm0 168a72 72 0 1 1 72-72a72.08 72.08 0 0 1-72 72Zm36.49-112.49a12 12 0 0 1 0 17l-28 28a12 12 0 0 1-17-17l28-28a12 12 0 0 1 17 0ZM92 16a12 12 0 0 1 12-12h48a12 12 0 0 1 0 24h-48a12 12 0 0 1-12-12Z" />
                    </svg>
                </div>
                <div id="timer" class="ExamTimer"></div>
            </div>
        </div>

        
        {{-- @if (auth()->guard('user_data')->check()) --}}
        {{-- @endif --}}
        
        
        <form id="examForm" action="{{ url('/exam') }}" method="POST">
            @csrf
            <input type="text" value="{{ auth()->guard('user_data')->user()->name }}" name="student_name" hidden>
            <input type="text" value="{{ auth()->guard('user_data')->user()->student_id }}" name="studentId" hidden>
            <div class="form-wrapper" id="form-wrapper">


                @foreach ($quiz as $qd)
                    <div class="question-option-section @if ($loop->first) current @endif">
                        <input type="text" value="{{ $qd['subject_id'] }}" name="subjectId" hidden>
                        <input type="text" value="{{ $qd['id'] }}" name="QuestionNo_{{ $qd['id'] }}" hidden>


                        <div class="question"><span class="Question-NO">{{ $loop->iteration }}.</span><span
                                class="Question-text">{{ $qd['question'] }}</span></div>

                        <ul>
                            <li><input type="radio" value="{{ $qd['ans1'] }}"
                                    name="OptionOf_{{ $qd['id'] }}"  required>{{ $qd['ans1'] }}</li>
                            <li><input type="radio" value="{{ $qd['ans2'] }}"
                                    name="OptionOf_{{ $qd['id'] }}"  required>{{ $qd['ans2'] }}</li>
                            <li><input type="radio" value="{{ $qd['ans3'] }}"
                                    name="OptionOf_{{ $qd['id'] }}"  required>{{ $qd['ans3'] }}</li>
                            <li><input type="radio" value="{{ $qd['ans4'] }}"
                                    name="OptionOf_{{ $qd['id'] }}"  required>{{ $qd['ans4'] }}</li>
                        </ul>

                    </div>
                @endforeach
            </div>

            <div class="submit-botton">
                <input type="hidden" name="countDownTimer" value="15">
                <button type="submit" class="btn-submit-exam">Submit Exam</button>
            </div>
        </form>
        <div class="prev-next-btn-group">
            <button class="btn-prev-next btn-prev" id="prev-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path fill="currentColor" d="m5.83 9l5.58-5.58L10 2l-8 8l8 8l1.41-1.41L5.83 11H18V9z" />
                </svg>
            </button>
            <button class="btn-prev-next btn-next" id="next-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M2 11h12.2l-5.6 5.6L10 18l8-8l-8-8l-1.4 1.4L14.2 9H2z" />
                </svg></button>
        </div>
    </div>

    <script>
        const timer = document.getElementById("timer");
        let targetTime = localStorage.getItem("targetTime");

        const updateTimer = () => {
            const currentTime = new Date().getTime();
            const timeRemaining = targetTime - currentTime;

            if (timeRemaining <= 0) {
                timer.textContent = "00:00";
            } else {
                const minutes = Math.floor(timeRemaining / 60000);
                const seconds = Math.floor((timeRemaining % 60000) / 1000);
                timer.textContent = minutes.toString().padStart(2, '0') + ":" + seconds.toString().padStart(2, '0');
            }
        };

        // Function to submit the form
        const submitForm = () => {
            const examForm = document.getElementById("examForm");
            examForm.submit();
            localStorage.removeItem("targetTime");
        };

        // Check if the target time is stored in local storage
        if (targetTime) {
            updateTimer();
            setInterval(updateTimer, 1000);

            // Calculate the remaining time and delay the form submission
            const currentTime = new Date().getTime();
            const remainingTime = targetTime - currentTime;

            if (remainingTime > 0) {
                setTimeout(submitForm, remainingTime);
            } else {
                timer.textContent = "Time's up!";
                localStorage.removeItem("targetTime");
            }
        } else {
            // If target time is not stored, set it to 15 minutes from the current time
            const currentTime = new Date().getTime();
            targetTime = currentTime + 15 * 60000;
            localStorage.setItem("targetTime", targetTime);
            updateTimer();
            setInterval(updateTimer, 1000);
            setTimeout(submitForm, 15 * 60000);
        }
    </script>

    <script>
        const formWrapper = document.getElementById('form-wrapper');
        const prevButton = document.getElementById('prev-btn');
        const nextButton = document.getElementById('next-btn');
        const questions = document.querySelectorAll('.question-option-section');

        let currentQuestionIndex = 0;
        let submitted = false;

        // Scroll to the current question
        const scrollToQuestion = () => {
            questions[currentQuestionIndex].scrollIntoView({
                behavior: 'smooth'
            });
        };

        // Update the current question index and scroll to the new question
        const goToQuestion = (index) => {
            questions[currentQuestionIndex].classList.remove('current');
            currentQuestionIndex = index;
            questions[currentQuestionIndex].classList.add('current');
            scrollToQuestion();
        };

        // Update the currentQuestionIndex variable on scroll
        formWrapper.addEventListener('scroll', () => {
            let currentQuestionTop = Infinity;
            questions.forEach((question, index) => {
                const questionTop = question.getBoundingClientRect().top;
                if (questionTop >= 0 && questionTop < currentQuestionTop) {
                    currentQuestionTop = questionTop;
                    currentQuestionIndex = index;
                }
            });
        });

        // Scroll to the previous question
        prevButton.addEventListener('click', () => {
            if (currentQuestionIndex > 0) {
                goToQuestion(currentQuestionIndex - 1);
            }
        });

        // Scroll to the next question
        nextButton.addEventListener('click', () => {
            if (currentQuestionIndex < questions.length - 1) {
                goToQuestion(currentQuestionIndex + 1);
            }
        });

        // Submit the exam
        const submitButton = document.getElementById('submit-btn');
        submitButton.addEventListener('click', () => {
            submitted = true;
        });
    </script>
</body>

</html>
