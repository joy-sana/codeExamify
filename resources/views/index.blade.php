<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image" rel="dhotycut icon" href="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}">
    <title>CodeExamify</title>

    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <!-- Demo styles -->
    <style>
        .swiper-slide {

            position: relative;
            font-size: 18px;
            background: transparent;
            display: flex;
            height: calc(var(--cardheight) - 0px);
            margin: 0 0;
            justify-content: center;
            align-items: center;
        }

        .site-sub-title {
            height: 100px;
            width: 90vw;
            margin: 2rem auto;
            margin-bottom: -2.5rem;
            margin-inline: auto;
        }

        .site-sub-title>h2 {
            font-size: 2rem;
            text-align: center;
            color: #27374D;
        }

        .test-details li {
            font-family: 'Rubik', sans-serif !important;
            color: #F9FBE7;
            text-align: center;
        }

        .yellow {
            color: yellow;
        }

        .topic-name {

            font-family: 'Rubik', sans-serif !important;
        }

        .topic-details {
            font-family: 'Rubik', sans-serif !important;
            font-size: .9rem;
        }
    </style>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</head>

<body>
    @php
        $data = Session::all();
        $id = session()->get('loginId');
    @endphp

    @include('header')

    <header class="site-header">
        <div class="site-header-mask">
            <h1 class="site-title"><span>CodE</span>xamify</h1>
        </div>
    </header>


    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        <script>
            setTimeout(function() {
                $('.alert-success').hide();
            }, 5000);
        </script>
    @endif

    @php
        $colors = ['#41644A', '#917FB3', '#3C486B', '#1B9C85', '#009FBD'];
    @endphp
    <div class="site-sub-title">
        <h2>
            Available Exams
        </h2>
    </div>
    <div class="slide-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper  coustom-wrapper">

                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/5') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/PHP.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[0] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[0] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/php.jpeg') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">php</span></div>
                                    <div class="topic-details"> Server-side scripting language for dynamic web
                                        development.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/3') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/JAVASCRIPT.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[1] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[1] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/javascript.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">JavaScript</span></div>
                                    <div class="topic-details"> Client-side scripting language for interactive web
                                        development and enhanced user experience.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/1') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/HTML.jpeg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[2] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[2] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/html.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">HTML</span></div>
                                    <div class="topic-details">Standard markup language for web pages, providing
                                        website structure and content.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/2') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/PYTHON.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[4] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[4] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/python.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">Python</span> </div>
                                    <div class="topic-details">Powerful, easy-to-learn programming language for web
                                        development, data analysis, and automation.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/4') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/JAVA.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[3] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[3] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/java.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">JAVA</span> </div>
                                    <div class="topic-details">Versatile, platform-independent programming language
                                        with extensive libraries.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/5') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/PHP.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[0] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[0] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/php.jpeg') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">php</span></div>
                                    <div class="topic-details"> Server-side scripting language for dynamic web
                                        development.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/3') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/JAVASCRIPT.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[1] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[1] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/javascript.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">JavaScript</span></div>
                                    <div class="topic-details"> Client-side scripting language for interactive web
                                        development and enhanced user experience.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/1') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/HTML.jpeg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[2] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[2] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/html.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">HTML</span></div>
                                    <div class="topic-details">Standard markup language for web pages, providing
                                        website structure and content.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/2') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/PYTHON.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[4] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[4] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/python.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">Python</span> </div>
                                    <div class="topic-details">Powerful, easy-to-learn programming language for web
                                        development, data analysis, and automation.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card"><a href="{{ url('/Subject/4') }}">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img class="card-image" src="{{ asset('css/image/subject/JAVA.jpg') }}"
                                        alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-shape" style="background-color: {{ $colors[3] }} !important;"></div>
                            <div class="card-shape2" style="background-color: {{ $colors[3] }} !important;"></div>
                            <div class="card-content">
                                <div class="name-img-box"><img src="{{ asset('css/image/subject/java.png') }}"
                                        alt="">
                                </div>
                                <div class="test-name">
                                    <div class="topic-name"><span class="yellow">JAVA</span> </div>
                                    <div class="topic-details">Versatile, platform-independent programming language
                                        with extensive libraries.</div>
                                </div>
                                <div>

                                    <ul class="test-details">
                                        <li><span class="yellow">15</span> Minutes</li>
                                        <li><span class="yellow">15</span> Questions</li>
                                        <li><span class="yellow">Medium</span> Difficulty</li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


    @include('footer')


    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 1,
            slidesPerGroup: 1,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            centeredSlides: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                420: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 3,
                },
                1008: {
                    slidesPerView: 4,
                },
                1400: {
                    slidesPerView: 5,
                    slidesPerGroup: 2,
                },

            },
        });
    </script>

</body>

</html>
<!-- Initialize Swiper -->
