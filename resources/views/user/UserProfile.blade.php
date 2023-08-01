<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/userProfile.css') }}">

</head>

<body>
    @include('header')
    @php
        $data = Session::all();
        $id = session()->get('loginId');
    @endphp

    @if (Session::has('success'))
        <span>{{ Session::get('success') }}</span>
    @endif
    @if (Session::has('fail'))
        <span>{{ Session::get('fail') }}</span>
    @endif
    @csrf

    <div class="profile-dashboard">
        <div class="sidebar">
            <div class="profile-picture">

                @if (auth()->guard('user_data')->user()->gender == 'm')
                    <img class="profil-pic" src="{{ asset('css/image/profile-pic-male.png') }}">
                @elseif(auth()->guard('user_data')->user()->gender == 'f')
                    <img class="profil-pic" src="{{ asset('css/image/profile-pic-female.png') }}">
                @else
                    <img class="profil-pic" src="{{ asset('css/image/profile-pic-other.png') }}">
                @endif

                <div class="profile-info">
                    <h2>{{ $userdata->name }}</h2>
                    <h4>{{ $userdata->username }}</h4>
                </div>
            </div>
            <div class="sidebar-buttons">
                <button class="btn btn-account-settings  open-button">Account Settings</button>
                <a href="{{ url('/profile/change-password') }}/{{ $userdata->student_id }}">
                    <button class="btn btn-change-password">Change Password</button></a>
                <a href="{{ url('/logout') }}">
                    <button class="btn btn-logout">Logout</button></a>
            </div>
        </div>


        <div class="content">
            <div class="site-title">
                <h1>profile</h1>
            </div>

            <div class="profile-wrapper">


                <div class="user-details">

                    <div class="contact-details">
                        <h3>Contact Details</h3>
                        <ul>
                            <li>Email: {{ $userdata->email }}</li>
                            <li>Mobile: {{ $userdata->mobile }}</li>
                        </ul>
                    </div>

                    <div class="personal-details">
                        <h3>Personal Details</h3>
                        <ul>
                            <li>Gender:
                                @if ($userdata->gender == 'm')
                                    Male
                                @elseif($userdata->gender == 'f')
                                    Female
                                @else
                                    Mental
                                @endif
                            </li>
                            <li>Date of Birth: {{ \App\helper::formatdate($userdata->dob, 'd/M/Y') }}</li>
                        </ul>
                    </div>

                    <div class="personal-details counttt">
                        <h3>Number of Exams: <span class="yellow">{{$result_count}}</span></h3>
                    </div>

                </div>
                <div class="marks-table">
                    <h3>Marks</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Percent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                                <td>{{$result->subject->subject_name }}</td>
                                <td>{{$result->marks_obtained}}</td>
                                <td><span id="percent{{$result->id}}"></span></td>
                                <script>
                                    var obtainedMarks = {{$result->marks_obtained}};
                                    var totalMarks = 15;
                                    var percent = (obtainedMarks / totalMarks) * 100;
                                    document.getElementById('percent{{$result->id}}').innerText = percent.toFixed(2) + '%';
                                </script>
                            </tr>
                            @endforeach
                            <!-- Add more rows for other subjects -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    @include('footer')


    <dialog class="modal " id="modal">
        @include('user.updateForm')
    </dialog>

    {{-- <dialog  open class="modal-Change" id="modal-Change">
        @include('user.changePassForm')
    </dialog> --}}
    {{-- @include('footer') --}}
</body>

</html>
