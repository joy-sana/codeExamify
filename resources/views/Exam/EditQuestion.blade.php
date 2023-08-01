<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/UploadQuestion.css') }}">
</head>

<body>
    @include('header')
    <h1>Question Editor</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/Admin/edit/questions') }}" method="post">
        @csrf
        <input value="{{ $subject_id }}" name="subject_id" hidden >
        <table>
            <thead>
                <tr>
                    <th>Sl. No.</th>
                    <th>Q. Id.</th>
                    <th>Question Answer</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $question->id }}.</td>
    
                            <td class="ques-ans-rows">
                                <input type="text" id="question_{{ $question->id }}" name="questions[]"
                                    value="{{ $question->question }}" placeholder="Question" required>
                                <input type="text" id="ans_{{ $question->id }}" name="ans[]" value="{{ $question->ans }}"
                                    placeholder="Answer" required>
                            </td>
    
                            <td class="option-rows">
                                <input type="text" id="option_1_{{ $question->id }}"
                                    name="options[{{ $question->id }}][]" value="{{ $question->ans1 }}"
                                    placeholder="Option 1" required>
                                <input type="text" id="option_2_{{ $question->id }}"
                                    name="options[{{ $question->id }}][]" value="{{ $question->ans2 }}"
                                    placeholder="Option 2" required>
                                <input type="text" id="option_3_{{ $question->id }}"
                                    name="options[{{ $question->id }}][]" value="{{ $question->ans3 }}"
                                    placeholder="Option 3" required>
                                <input type="text" id="option_4_{{ $question->id }}"
                                    name="options[{{ $question->id }}][]" value="{{ $question->ans4 }}"
                                    placeholder="Option 4" required>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    
        <button type="submit">Submit Questions</button>
    </form>
    
    

    @include('footer')

</body>

</html>
