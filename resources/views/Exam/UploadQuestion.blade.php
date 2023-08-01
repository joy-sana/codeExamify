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

    <h1 class="site-title">Upload Questions</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <form action="{{ url('/Admin/upload/exam') }}" method="post">
        @csrf


        <select id="subject" name="subject_id" class="Subject-select-style">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
            @endforeach
        </select>


        <table>
            <thead>
                <tr>
                    <th>Sl. No.</th>
                    <th>Question Answer</th>
                    <th>Options</th>

                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 15; $i++)
                    @php
                        $iteration = $i + 1;
                    @endphp
                    <tr>
                        <td>{{ $iteration }}.</td>

                        <td class="ques-ans-rows">
                            <input type="text" id="question_{{ $i }}" name="questions[]" value=""
                                placeholder="Question {{ $iteration }}" required>

                            <input type="text" id="ans_{{ $i }}" name="ans[]" value=""
                                placeholder="Answer" required>
                        </td>

                        <td class="option-rows">
                            <input type="text" id="option_1_{{ $i }}"
                                name="options[{{ $i }}][]" value="" placeholder="Option 1" required>
                            <input type="text" id="option_2_{{ $i }}"
                                name="options[{{ $i }}][]" value="" placeholder="Option 2" required>
                            <input type="text" id="option_3_{{ $i }}"
                                name="options[{{ $i }}][]" value="" placeholder="Option 3" required>
                            <input type="text" id="option_4_{{ $i }}"
                                name="options[{{ $i }}][]" value="" placeholder="Option 4" required>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>

        <button type="submit">Submit Questions</button>
    </form>


    @include('footer')

</body>

</html>
