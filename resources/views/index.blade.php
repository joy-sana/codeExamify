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


{{-- 

---COCOMO
    -what is cocomo
    -type of cocomo
    -what kind of cocomo used in your project and why
    -how do you know you used this cocomo model

---ERD
    -Study your Erd properly and implement it properly like project 
    -If something is not implemented in your project do not apply that thing on erd do not show extra thing in erd 

---DFD
    -Implement in properly 
    -Level of dfd
    -context dfd

---SDLC
    -what kind of model you use

---BACKEND
    -How did you implement authentication, data fetching, prevent duplicate data (email/mobile no/userId/username),logout, storing book,library system, whole backend ETC. 
    -What kind of Admin do you have (normal admin or Super admin)
    



    <emp>
    <employee>
        <empname>John Doe</empname>
        <id>001</id>
        <gender>Male</gender>
        <address>
            <street>
                <street1>Main Street</street1>
                <street2>Apartment 123</street2>
            </street>
            <city>New York</city>
            <region>NY</region>
            <postalcode>10001</postalcode>
            <countrycode c_id="US">USA</countrycode>
        </address>
    </employee>
    
    <employee>
        <empname>Jane Smith</empname>
        <id>002</id>
        <gender>Female</gender>
        <address>
            <street>
                <street1>First Avenue</street1>
                <street2>Suite 456</street2>
            </street>
            <city>Los Angeles</city>
            <region>CA</region>
            <postalcode>90001</postalcode>
            <countrycode c_id="US">USA</countrycode>
        </address>
    </employee>
</emp>


9. Find maximum and minimum element in an array in PHP:
php
Ans
<?php
$array = array(5, 2, 8, 1, 6);

$max = max($array);
$min = min($array);

echo "Maximum Element: $max<br>";
echo "Minimum Element: $min";
?>
10. Program to change strings in an array to uppercase:
php
Copy code
<?php
$array = array("apple", "banana", "cherry");

$uppercaseArray = array_map('strtoupper', $array);

print_r($uppercaseArray);
?>
11. Program for Writing Data to a file in PHP:
php
Copy code
<?php
$data = "Hello, this is some data to be written to a file.";

// Open the file in write mode
$file = fopen("example.txt", "w");

// Write data to the file
fwrite($file, $data);

// Close the file
fclose($file);

echo "Data written to file successfully.";
?>
12. Program to create and retrieve an applet in PHP:
Note: PHP is a server-side scripting language, and traditionally, applets are associated with client-side technologies like Java. PHP itself doesn't create or run client-side applets. However, if you want to embed Java applets into HTML using PHP, you can do so using HTML and PHP.

php
Copy code
<?php
// PHP code to generate HTML with embedded Java applet
echo '<html>';
echo '<head>';
echo '<title>PHP Applet Example</title>';
echo '</head>';
echo '<body>';
echo '<applet code="YourAppletClass.class" width="300" height="300">';
echo 'Your browser does not support the Java applet tag.';
echo '</applet>';
echo '</body>';
echo '</html>';
?>





 --}}
