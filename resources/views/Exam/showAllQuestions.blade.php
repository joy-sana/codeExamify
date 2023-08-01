<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/UploadQuestion.css') }}">
</head>
<style>
    table,
    .q-table{
        max-width: 95vw !important;
        margin-inline: auto;
    }
.subject-name-caption{
    border-top: 4px solid black;
    margin: 2rem 0 0 0 !important;
    padding: 2rem 0 0 4rem;
}
main{
    margin-bottom: 8rem;
}
</style>
<body>
    @include('header')


    <main>
    <h1 class="site-title">All  Questions By Subject</h1>

    @foreach($subjects as $subject)
    <h2 class="subject-name-caption">{{ $subject->subject_name }}</h2>

    <table class="q-table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Answer 1</th>
                <th>Answer 2</th>
                <th>Answer 3</th>
                <th>Answer 4</th>
                <th>Correct Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions->where('subject_id', $subject->id) as $question)
            <tr>
                <td>{{ $question->question }}</td>
                <td>{{ $question->ans1 }}</td>
                <td>{{ $question->ans2 }}</td>
                <td>{{ $question->ans3 }}</td>
                <td>{{ $question->ans4 }}</td>
                <td>{{ $question->ans }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

</main>
    @include('footer')
</body>

</html>
