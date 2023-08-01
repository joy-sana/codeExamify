<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image" rel="dhotycut icon" href="{{ asset('css/image/LogoMakerCa-1682859900065.png') }}">
    <link rel="stylesheet" href="{{ asset('css/learn-page.css') }}">

</head>

<body style="background-color: #393646;">
    @include('header')


    <div class="card-wrapper">
        <div class="card">
            <div class="card-title">
                <h2>Learn PHP</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/PHP.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>PHP.net</h3>
            </div>
            <div class="site-details">
                <p>Official PHP documentation and tutorials, covering all aspects of PHP programming and providing a
                    wealth of learning resources.</p>
            </div>
            <a href="{{ url('https://www.php.net') }}"><button class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn Java</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/JAVA.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>Oracle Java Tutorials</h3>
            </div>
            <div class="site-details">
                <p>Java learning platform by Oracle, offering in-depth tutorials, documentation, and code examples for
                    Java programming.</p>
            </div>
            <a href="{{ url('https://www.oracle.com/java/technologies/javase-jdk11-doc-downloads.html') }}"><button
                    class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn JavaScript</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/JAVASCRIPT.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>MDN Web Docs</h3>
            </div>
            <div class="site-details">
                <p>Trusted resource for learning JavaScript, providing extensive guides, reference materials, and
                    interactive code playgrounds.</p>
            </div>
            <a href="{{ url('https://developer.mozilla.org/en-US/') }}"><button class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn Python</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/PYTHON.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>Python.org</h3>
            </div>
            <div class="site-details">
                <p>Master Python programming. Learn from beginner to advanced levels.</p>
            </div>
            <a href="{{ url('https://www.python.org') }}"><button class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn HTML</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/HTML.jpeg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>W3Schools</h3>
            </div>
            <div class="site-details">
                <p>Popular website for learning HTML, CSS, JavaScript, PHP, and more, offering practical examples and
                    interactive exercises.</p>
            </div>
            <a href="{{ url('https://www.w3schools.com') }}"><button class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn PHP</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/PHP.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>PHP.net</h3>
            </div>
            <div class="site-details">
                <p>Official PHP documentation and tutorials, covering all aspects of PHP programming and providing a
                    wealth of learning resources.</p>
            </div>
            <a href="{{ url('https://www.php.net') }}"><button class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn Java</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/JAVA.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>Oracle Java Tutorials</h3>
            </div>
            <div class="site-details">
                <p>Java learning platform by Oracle, offering in-depth tutorials, documentation, and code examples for
                    Java programming.</p>
            </div>
            <a href="{{ url('https://www.oracle.com/java/technologies/javase-jdk11-doc-downloads.html') }}"><button
                    class="learn-link-button">Start
                    learning</button></a>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Learn JavaScript</h2>
            </div>

            <div class="image-wrapper">
                <img src="{{ asset('css/image/subject/JAVASCRIPT.jpg') }}" alt="">
            </div>

            <div class="site-heading">
                <h3>MDN Web Docs</h3>
            </div>
            <div class="site-details">
                <p>Trusted resource for learning JavaScript, providing extensive guides, reference materials, and
                    interactive code playgrounds.</p>
            </div>
            <a href="{{ url('https://developer.mozilla.org/en-US/') }}"><button class="learn-link-button">Start
                    learning</button></a>
        </div>
    </div>
    @include('footer')
</body>

</html>
