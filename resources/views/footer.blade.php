<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Our Site</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our srvices</a></li>
                        <li><a href="#">prvacy policy</a></li>
                        <li><a href="#">affiliate marketting</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get help</h4>
                    <ul>
                        <li><a href="{{ url('/faq') }}">FAQ</a></li>
                     <li><a href="{{ url('/faq') }}">Ask Questions</a></li>
                            {{--<li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li> --}}
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>contact</h4>
                    <ul>
                        <li><a href="#">number</a></li>
                        <li><a href="#">info@gmail.com</a></li>
                        <li><a href="#">+123456789</a></li>
                        <li><a href="#">+123456788</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                    
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>