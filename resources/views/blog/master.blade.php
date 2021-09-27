<!doctype html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Sep 2021 02:13:17 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/tiny-slider.css">

    <link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('style.css')}}" />
    <title>MagDesign &mdash; Free Bootstrap 5 Website Template by Colorlib</title>
</head>

<body>


    <div id="app">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icofont-close js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <transition name="custom-classes-transition" enter-active-class="animated fadeInRight">
            <router-view></router-view>
        </transition>
        @auth
        <div class="site-footer">
            <div class="container">
                <div class="row justify-content-center copyright">
                    <div class="col-lg-7 text-center">
                        <div class="widget">
                            <ul class="social list-unstyled">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon-youtube-play"></span></a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <p>Copyright &copy; 2021 All rights reserved | This template is made with <i
                                    class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com/" target="_blank" rel="nofollow noopener">Colorlib</a>
                            </p>
                            <div class="d-block">
                                <a href="#" class="m-2">Terms &amp; Conditions</a>/
                                <a href="#" class="m-2">Privacy Policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth

    </div>

    <script src="{{ asset('js/app.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>






</body>

<!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Sep 2021 02:13:27 GMT -->

</html>
