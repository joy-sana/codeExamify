<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="image" rel="dhotycut icon" href="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}">
    <title>CodeExamify</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <style>
        .light-color {
            background-color: #dde6ed;
            border-radius: 0 0 .8rem .8rem;
        }
    </style>
</head>

<body>
    @php
        $id = session()->get('loginId');
    @endphp

    <header class="nav-header">
        <button class="pancake-button" onclick="pancakeMenu()"><img class="pancake-image"
                src="{{ asset('css/image/pancake.png') }}" alt=""></button>
        <div class="site-logo">
            <a href="{{ url('/home') }}">
                <img class="exam-logo" src="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}" alt="">
                <span class="exam-title"><span class="txt-yellow">Code</span>Examify</span>
            </a>
        </div>
        <nav>
            <!-- <img src="C:\Users\joy\Downloads\—Pngtree—office computer supplies decoration_4709059.png" alt="logo" class="logo"> -->
            <ul class="nav_link">
                <li><a href="{{ url('/home') }}">Home</a></li>
                @if (auth()->guard('admin_data')->check())
                    <li><a href="{{ url('/Admin/dashboard') }}">Dashboard</a></li>
                @endif
                <li><a href="{{ url('/feedback') }}">Feedback</a></li>
                <li><a href="{{ url('/learn') }}">Learn</a></li>
                <li><a href="{{ url('/faq') }}">Help & FAQ</a></li>

            </ul>
        </nav>

        @if (auth()->guard('admin_data')->check())
            <div class="dropdown-profile" id="dropdown-profile">
                <button class="dropbtn-profile " onclick="toggleProfileMenu()"
                    data-show-name="{{ auth()->guard('admin_data')->user()->Admin_name }}">
                    <img class="profil-pic" src="{{ asset('css/image/profile-pic-other.png') }}">
                </button>
                <div class="dropdown-content-profile " id="profile-menu">
                    <span> welcome back {{ auth()->guard('admin_data')->user()->Admin_name }} </span>
                    <a href="{{ url('/Admin/dashboard') }}">Dashboard</a>
                    <a href="{{ url('/admin/logout') }}"><button class="btn-logout"><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M20 12h-9.5m7.5 3l3-3l-3-3m-5-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1" />
                            </svg> logout</button></a>
                </div>
            </div>
        @elseif (auth()->guard('user_data')->check())
            <div class="dropdown-profile" id="dropdown-profile">
                <button class="dropbtn-profile" onclick="toggleProfileMenu()"
                    data-show-name="{{ auth()->guard('user_data')->user()->name }}">
                    @if (auth()->guard('user_data')->user()->gender == 'm')
                        <img class="profil-pic" src="{{ asset('css/image/profile-pic-male.png') }}">
                    @elseif(auth()->guard('user_data')->user()->gender == 'f')
                        <img class="profil-pic" src="{{ asset('css/image/profile-pic-female.png') }}">
                    @else
                        <img class="profil-pic" src="{{ asset('css/image/profile-pic-other.png') }}">
                    @endif
                </button>
                <div class="dropdown-content-profile" id="profile-menu">
                    <span>{{ auth()->guard('user_data')->user()->name }} </span>
                    <a href="{{ url("/profile/$id") }}">profile</a>
                    <a href="{{ url('/logout') }}"><button class="btn-logout"><svg xmlns="http://www.w3.org/2000/svg"
                                width="18" height="18" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M20 12h-9.5m7.5 3l3-3l-3-3m-5-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1" />
                            </svg>
                            logout</button></a>
                </div>
            </div>
        @else
            {{-- <button class="dropbtn dropbtn-toggle-login " onclick="loginToggleMenu()">login activity</button> --}}
            <div class="login-btn-grp">
                <a href="{{ url('/login') }}"><button class="btn-log" type="submit">Sign In</button></a>
                <a href="{{ url('/register') }}"><button class="btn-log" type="submit">Sign Up</button></a>
                <a href="{{ url('/admin') }}"><button class="btn-log btn-log-admin" type="submit">Admin Sign
                        In</button></a>
            </div>

        @endif
    </header>

    <nav class="responsive-nav" id="responsive-nav-id">

        <ul class="responsive-nav-ul">
            <li class="responsive-nav-li  nav-li-home"><a href={{ url('/home') }}">home</a></li>
            @if (auth()->guard('admin_data')->check())
            <li class="responsive-nav-li  nav-li-home"><a href="{{ url('/Admin/dashboard') }}">Dashboard</a></li>
            @endif
            {{-- <li class="responsive-nav-li"><a href="#">manage</a></li> --}}
            {{-- <li class="responsive-nav-li"><a href="#">resource</a></li> --}}
            <li class="responsive-nav-li"><a href="{{ url('/feedback') }}">Feedback</a></li>
            <li class="responsive-nav-li"><a href="{{ url('/learn') }}">Learn</a></li>
            <li class="responsive-nav-li"><a href="{{ url('/faq') }}">Help & FAQ</a></li>



            @if (auth()->guard('admin_data')->check())
                <li class="responsive-nav-li light-color">
                    <a href="{{ url('/admin/logout') }}"><button class="btn-logout "><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M20 12h-9.5m7.5 3l3-3l-3-3m-5-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1" />
                            </svg> logout</button></a>
                </li>
            @elseif (auth()->guard('user_data')->check())
                <li class="responsive-nav-li light-color">
                    <a href="{{ url('/logout') }}"><button class="btn-logout "><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="M20 12h-9.5m7.5 3l3-3l-3-3m-5-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1" />
                            </svg>
                            logout</button></a>
                </li>
            @else
                <li class="responsive-nav-li"> <button class="responsive-btn-log btn-signin ">sign in</button>
                    <button class="responsive-btn-log btn-signup">sign up</button>
                </li>
            @endif
            </li>

        </ul>
    </nav>
</body>

</html>

<script>
    function pancakeMenu() {
        var menu = document.getElementById("responsive-nav-id");
        if (menu.style.display === "block") {
            menu.style.animation = "swipe-out 500ms forwards";
            setTimeout(function() {
                menu.style.display = "none";
                menu.style.animation = "";
            }, 500);
        } else {
            menu.style.display = "block";
            menu.style.animation = "swipe-in 500ms forwards";
        }
    }

    function toggleProfileMenu() {
        var menu = document.getElementById("profile-menu");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }


    function loginToggleMenu() {
        var menu = document.getElementById("dropdown-menu-login");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }

    function toggleMenu() {
        var menu = document.getElementById("dropdown-menu");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn-toggle')) {
            var dropdowns = document.getElementsByClassName("close-dropdown");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>
