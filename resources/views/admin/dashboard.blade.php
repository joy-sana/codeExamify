<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/AdminDashboard.css') }}">
    <link type="image" rel="dhotycut icon" href="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}">
    <title>CodeExamify</title>
    {{-- <link rel="stylesheet" href="AdminDashboard.css"> --}}
    <style>
        .small-menus-heading {
            text-align: center;
            padding: .5rem 0 1rem 0;
            color: #FBFFDC;
            font-weight: 500;
        }
        HTML{
            scroll-behavior: smooth;
        }
    </style>

</head>

<body>
    <div class="site-title">
        <h1>Admin panel</h1>
    </div>



    <div class="side-bar">

        <div class="profile-section border-effect-main">

            <div class="profile-pic-container">
                <img src="{{ asset('css\image\LogoCodeexamify.jpg') }}" alt="">
            </div>
            <div class="admin-name">
                <h2>Joy sana </h2>
                <h4>Admin ID: LARAVEL0048</h4>
            </div>
            <div class="profile-btn-grp">
                <button onclick="scrollToTop()">Users Management</button>
                <button class="nav-buttons-exam-user" onclick="scrollToBottom()">Exam Management</button>

                <a href="{{ url('/Admin/UpdateAdmin') }}"><button>Account Settings</button></a>
                {{-- <form action="{{ url('/Admin/UpdateAdminID') }}" method="Post">
                <input type="text" name="adminID" value="{{auth()->guard('admin_data')->user()->Admin_number}}" hidden>
                <button type="submit">Account Settings</button>
            </form> --}}

                <a href="{{ url('/Admin/newAdmin') }}"><button>Add New Admin</button></a>

                <a class="logout-button-profile" href="{{ url('/admin/logout') }}"><button>Logout</button></a>


            </div>
        </div>
    </div>





    <div id="user-containerr" class="user-container complete-page">

        <div class="container-title">
            User Control Panel
        </div>

        <section class="User-section">



            <div class="table-wrapper">
                <div class="table-background">
                    <div class="small-menus-user-count">
                        <p class="user-count"><span>{{ $user_count }}</span> Users</p>
                    </div>
                    <table class="Recent-Users">
                        <caption>
                            Recent Registerations!!
                        </caption>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th class="Email-feild">Email</th>
                                <th>Creation Time</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($user_datas as $user_data)
                                <tr>
                                    <td class="Name-feild data-cell=" Name">{{ $user_data->name }}</td>
                                    <td class="Username-feild" data-cell="Username">{{ $user_data->username }}</td>
                                    <td class="Email-feild" data-cell="Email">{{ $user_data->email }}</td>
                                    <td class="create-time-feild" data-cell="create_at">{{ $user_data->created_at }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <a href="{{ url('/Admin/management/user') }}">
                    <button class="manage-user-btn">manage users</button>
                </a>
            </div>

            <div class="feedback-container">
                <!-- <div class="overlay-bar-feedback"> </div> -->
                <h3 class="small-menus-heading">feedback</h3>

                <div class="feedback-wrapper">
                    @foreach ($UserFeedbacks as $Feedback)
                        <div class="feedback-tab">
                            <div class="user-credentials">
                                <p class="feedback-username">{{ $Feedback->userFullName }}</p>
                                <p class="feedback-timestamp"> {{ $Feedback->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="feedback-content">{{ $Feedback->feedback_content }}</div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section>
    </div>



    <div id="exam-containerr" class="exam-container complete-page">
        <div class="container-title">
            Exam Control Panel
        </div>
        <div class="Subject-list-menu border-effect-sub">
            <h3 class="small-menus-heading">{{ $subjects_count }} Subjects Currently</h3>
            <ul>
                @foreach ($subjects as $subject)
                    <li>{{ $subject->subject_name }}</li>
                @endforeach
            </ul>
        </div>


        <section class="exam-section">
            <div class="Result-Table-wrapper">
                <div class="table-background">
                    <table class="Recent-Exams">
                        <caption>
                            Recent Exams!!
                        </caption>
                        <thead>
                            <tr>
                                <th>Student name</th>
                                <th>Subject</th>
                                <th>Marks</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($allResults as $row)
                                <tr>
                                    <td>{{ $row->studentData->name }}</td>
                                    <td>{{ $row->subject->subject_name }}</td>
                                    <td>{{ $row->marks_obtained }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class='pagination'>
                    {{ $allResults->onEachSide(1)->links() }}
                </div>

            </div>
            <div class="Exam-section-buttonGRP">

                <a href="{{url('/Admin/upload/subject')}}">
                    <button class=" manage-exam-btn">Upload Subject</button></a>

                <a href="{{url('/Admin/upload/exam')}}">
                    <button class=" manage-exam-btn">Upload Question</button></a>

                <a href="/Admin/questions/view">
                    <button class=" manage-exam-btn">view Questions</button></a>
                <a href="{{ url('/Admin/edit/selectSubject') }}">
                    <button class=" manage-exam-btn">Edit Questions</button></a>
            </div>
        </section>

    </div>





    <script>
        function scrollToTop() {
            window.scrollTo(0, 0);
        }

        function scrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }
    </script>

</body>

</html>
