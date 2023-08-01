<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/UploadQuestion.css') }}">
    <style>
        select{
            align-self: center!important;
            margin: 1rem;
        }
        form > button{
            width: 250px;
        }
        label{
            margin-top: 2rem;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    @include('header')

    <form action="{{ url('/Admin/edit/exam') }}" method="post">
        @csrf
        <label for="subject_id">Select Subject
        </label>
        <select id="subject" name="subject_id" class="Subject-select-style">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
            @endforeach
        </select>
        <button type="submit">Edit Question</button>
    </form>


    @include('footer')
</body>
</html>